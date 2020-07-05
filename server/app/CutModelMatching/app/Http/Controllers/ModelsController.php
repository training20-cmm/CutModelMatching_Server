<?php

namespace App\Http\Controllers;

use App\Model;
use Illuminate\Http\Request;

class ModelsController extends Controller
{

    public function count()
    {
        return Model::count();
    }
}
