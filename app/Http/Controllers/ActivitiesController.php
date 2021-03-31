<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function create_trueorfalse()
    {
        return view('activities.trueorfalse.create');
    }
}
