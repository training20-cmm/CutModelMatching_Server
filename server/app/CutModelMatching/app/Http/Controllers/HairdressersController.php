<?php

namespace App\Http\Controllers;

use App\Hairdresser;
use Illuminate\Http\Request;

class HairdressersController extends Controller
{

    public function count()
    {
        return Hairdresser::count();
    }
}
