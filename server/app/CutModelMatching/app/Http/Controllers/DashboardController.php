<?php

namespace App\Http\Controllers;

use App\MenuTreatment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function analytics()
    {
        return view("analytics");
    }

    public function managementTreatment()
    {
        $treatmentList = MenuTreatment::all()->all();
        return view("management.treatment", [
            "treatmentList" => $treatmentList
        ]);
    }
}
