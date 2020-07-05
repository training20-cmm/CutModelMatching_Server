<?php

namespace App\Http\Controllers;

use App\Http\Responses\MenuCountByMenuTreatmentIdResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenusController extends Controller
{

    public function countByMenuTreatmentId()
    {
        $resultList = DB::table("menus as m")
            ->select("mt.id as menu_treatment_id", "mt.name as menu_treatment_name", DB::raw("count(*) as count"))
            ->join("menu_treatment_association as mta", "m.id", "mta.menu_id")
            ->join("menu_treatment as mt", "mt.id", "mta.menu_treatment_id")
            ->groupBy("mt.id", "mt.name")
            ->get()->all();
        $menuCountByMenuTreatmentIdResponses = array_map(function ($menuCountByMenuTreatmentId) {
            $menuCoutByMenuTreatmentIdResponse = new MenuCountByMenuTreatmentIdResponse();
            $menuCoutByMenuTreatmentIdResponse->fillWith(
                $menuCountByMenuTreatmentId->menu_treatment_id,
                $menuCountByMenuTreatmentId->menu_treatment_name,
                $menuCountByMenuTreatmentId->count
            );
            return $menuCoutByMenuTreatmentIdResponse;
        }, $resultList);
        return $menuCountByMenuTreatmentIdResponses;
    }
}
