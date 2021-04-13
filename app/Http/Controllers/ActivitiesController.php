<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function show_activities()
    {
        return view('activities.show');
    }
    public function create_trueorfalse()
    {
        return view('activities.trueorfalse.create');
    }

    public function create_complete()
    {
        return view('activities.complete.create');
    }

    public function create_select_correct()
    {
        return view('activities.selectthecorrect.create');
    }
}
