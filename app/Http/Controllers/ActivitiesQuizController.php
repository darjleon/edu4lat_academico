<?php

namespace App\Http\Controllers;

use App\Models\Activities_Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivitiesQuizController extends Controller
{

    public function saveInQuiz($quiz_id, $activity_id)
    {
        $existencia = Activities_Quiz::all()->where('prueba_id', $quiz_id)->where('actividad', $activity_id);
        if ($existencia->isEmpty()) {
            $relacion = new Activities_Quiz();
            $relacion->prueba_id = $quiz_id;
            $relacion->actividad = $activity_id;
            $relacion->save();
            return redirect()->route('activity.index', $quiz_id)->with('estado', 'Guardada');
        } else {

            foreach ($existencia as $existe)
                $existe->delete();
            return redirect()->route('activity.index', $quiz_id)->with('estado', 'Eliminada');
        }
    }


    public function saveInActivity($quiz_id, $activity_id, $lugar = null)
    {
        $existencia = Activities_Quiz::all()->where('prueba_id', $quiz_id)->where('actividad', $activity_id);
        if ($existencia->isEmpty()) {
            $relacion = new Activities_Quiz();
            $relacion->prueba_id = $quiz_id;
            $relacion->actividad = $activity_id;
            $relacion->save();
            return redirect()->route('activity.show', [$activity_id, $lugar])->with('estado', 'Guardada');
        } else {

            foreach ($existencia as $existe)
                $existe->delete();
            return redirect()->route('activity.show', [$activity_id, $lugar])->with('estado', 'Eliminada');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activities_Quiz  $activities_Quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Activities_Quiz $activities_Quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activities_Quiz  $activities_Quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Activities_Quiz $activities_Quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activities_Quiz  $activities_Quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activities_Quiz $activities_Quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activities_Quiz  $activities_Quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activities_Quiz $activities_Quiz)
    {
        //
    }
}
