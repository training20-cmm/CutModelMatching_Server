<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function analytics()
    {
        return view("analytics");
    }

    public function managementChat()
    {
        return view("management.chat");
    }
}
