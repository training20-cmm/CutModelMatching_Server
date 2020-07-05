<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $menuTreatment = MenuTreatment::create([
            "name" => $request->name
        ]);
        $menuTreatmentResponse = new MenuTreatmentResponse();
        $menuTreatmentResponse->constructWith($menuTreatment);
        return $menuTreatmentResponse;
    }
}
