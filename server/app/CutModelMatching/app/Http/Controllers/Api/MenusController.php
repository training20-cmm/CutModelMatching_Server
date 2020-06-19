<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenusController extends Controller
{

    // "title",
    //     "details",
    //     "gender",
    //     "price",
    //     "minutes",
    //     "hairdresser_id"

    public function store(CustomRequest $request) {
        $user = self::user($request->token());
        $hairdresser = Hairdresser::where("user_id", $user->id);
        $menu = DB::transaction(function() {
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
                foreach($request->images as $image) {
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
            if (!is_null($request->times)) {
                $menuTimeParameters = array_map(function($time) {
                    return ["start" => $time, "menu_id" => $menu->id];
                }, $request->times);
                DB::table(MenuTime::table())->insert($menuTimeParameters);
            }
            return $menu;
        });
        return $menu;
    }
}
