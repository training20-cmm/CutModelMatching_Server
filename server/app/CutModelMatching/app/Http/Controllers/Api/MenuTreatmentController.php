<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Responses\MenuTreatmentResponse;
use App\MenuTreatment;
use Illuminate\Http\Request;

class MenuTreatmentController extends Controller
{

    public function index()
    {
        $menuTreatmentList = MenuTreatment::all()->all();
        $menuTreatmentResponses = array_map(function ($menuTreatment) {
            $menuTreatmentResponse = new MenuTreatmentResponse();
            $menuTreatmentResponse->constructWith($menuTreatment);
            return $menuTreatmentResponse;
        }, $menuTreatmentList);
        return $menuTreatmentResponses;
    }
}
