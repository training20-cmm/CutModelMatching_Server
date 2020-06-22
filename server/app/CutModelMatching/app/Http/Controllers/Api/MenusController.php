<?php

namespace App\Http\Controllers\Api;

use App\Hairdresser;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomRequest;
use App\Http\Responses\MenuImageResponse;
use App\Http\Responses\MenuTagResponse;
use App\Http\Responses\MenuTreatmentResponse;
use App\Http\Responses\MenuResponse;
use App\Menu;
use App\MenuImage;
use App\MenuTime;
use App\Services\FileSaveService;
use App\Services\ResponseConvertService;
use Illuminate\Support\Facades\DB;

class MenusController extends Controller
{

    public function store(CustomRequest $request)
    {
        $user = self::user($request->token());
        $hairdresser = Hairdresser::where("user_id", $user->id)->first();
        $menu = DB::transaction(function () use ($request, $hairdresser) {
            $menu = Menu::create([
                "title" => $request->title,
                "details" => $request->details,
                "gender" => $request->gender,
                "price" => $request->price,
                "minutes" => $request->minutes,
                "hairdresser_id" => $hairdresser->id
            ]);
            if (!is_null($request->images)) {
                $menuImageParameters = [];
                foreach ($request->images as $image) {
                    if (!$image->isValid()) {
                        continue;
                    }
                    $fileSaveService = new FileSaveService();
                    $path = $fileSaveService->save($image, "images/menus/$menu->id");
                    $menuImageParameters[] = ["path" => $path, "menu_id" => $menu->id];
                }
                DB::table(MenuImage::table())->insert($menuImageParameters);
            }
            if (!is_null($request->tagIds)) {
                $menu->tags()->attach($request->tagIds);
            }
            if (!is_null($request->treatmentIds)) {
                $menu->treatment()->attach($request->treatmentIds);
            }
            if (!is_null($request->timeDates) && !is_null($request->timeStart)) {
                $timeDates = $request->timeDates;
                $timeStart = $request->timeStart;
                $menuTimeParameters = [];
                $count = min(count($timeDates), count($timeStart));
                for ($index = 0; $index < $count; ++$index) {
                    $menuTimeParameters[] = [
                        "date" => $timeDates[$index],
                        "start" => $timeStart[$index],
                        "menu_id" => $menu->id
                    ];
                }
                DB::table(MenuTime::table())->insert($menuTimeParameters);
            }
            return $menu;
        });
        $menu = Menu::with(["tags", "images", "treatment"])->where("id", $menu->id)->first();
        $converter = new ResponseConvertService();
        $menuResponse = new MenuResponse();
        $menuResponse->constructWith($menu);
        $menuResponse->tags = $converter->convert($menu->tags->all(), MenuTagResponse::class);
        $menuResponse->images = $converter->convert($menu->images->all(), MenuImageResponse::class);
        $menuResponse->treatment = $converter->convert($menu->treatment->all(), MenuTreatmentResponse::class);
        return $menuResponse;
    }
}
