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

    public function search(CustomRequest $request)
    {
        // $prefecture = $request->prefecture;
        // $treatmentIds = $request->treatmentIds;
        // $minPrice = $request->minPrice;
        // $maxPrice = $request->maxPrice;
        // $date = $request->date;
        // $startTime = $request->startTime;
        // $endTime = $request->endTime;
        // $gender = $request->gender;
        // $paymentMethods = $request->paymentMethods;
        // $salonScale = $request->salonScale;
        // $parking = $request->parking;
        return DB::table("menus as m")
            ->select(
                "m.id as m_id",
                "m.title as m_title",
                "m.details as m_details",
                "m.price as m_price",
                "m.minutes as m_minutes",
                "h.profile_image_path as h_profile_image_path",
                "h.name as h_name",
                "tag.name as tag_name",
                "s.name as s_name",
                "s.prefecture as s_prefecture",
                "treatment.name as treatment_name"
            )
            ->join("hairdressers as h", function ($join) {
                $join->on("m.hairdresser_id", "h.id");
            })
            ->join("menu_tag_association as tag_ass", function ($join) {
                $join->on("m.id", "tag_ass.menu_id");
            })
            ->join("menu_tags as tag", function ($join) {
                $join->on("tag.id", "tag_ass.menu_tag_id");
            })
            ->join("salons as s", function ($join) {
                $join->on("s.id", "h.salon_id");
            })
            ->join("menu_treatment_association as treatment_ass", function ($join) {
                $join->on("m.id", "treatment_ass.menu_id");
            })
            ->join("menu_treatment as treatment", function ($join) {
                $join->on("treatment.id", "treatment_ass.menu_treatment_id");
            })
            //
            ->where("s.prefecture", "東京都")
            ->where("m.price", ">=", "2003")
            ->where("m.price", "<=", "10000")
            //
            ->get()->all();
    }

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
