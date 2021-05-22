<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use App\Models\Activities_type;
use App\Models\Area;
use App\Models\Grade;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($quiz_id = null)
    {
        if ($quiz_id == null) {
            $actividades = DB::table('activities')
                ->orderBy('id', 'desc')->paginate(6);
            $act_tipo = Activities_type::all();
            return view('activities.administrarActividades', compact('actividades', 'quiz_id'), compact('act_tipo'));
        } else {
            $prueba = Quiz::find($quiz_id);
            $quiz_acti = $prueba->activities->modelKeys();
            $actividades = DB::table('activities')
                ->where('area', '=', $prueba->area)
                ->orderBy('id', 'desc')->paginate(6);
            $act_tipo = Activities_type::all();
            return view('activities.administrarActividades', compact('actividades', 'quiz_id'), compact('act_tipo', 'quiz_acti'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $quiz_id = null)
    {
        $actividad = new Activity();

        if ($request->nombre == "Verdadero o Falso") {

            $act_tipo = Activities_type::where('nombre', 'Verdadero o Falso')->get();
            $actividad->activity_type_id = $act_tipo[0]->id;
            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = $request->respuesta;
        } elseif ($request->nombre == "Respuesta única") {

            $act_tipo = Activities_type::where('nombre', 'Respuesta única')->get();
            $actividad->activity_type_id = $act_tipo[0]->id;
            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = json_encode(array($request->respuesta));;
            $actividad->opciones = json_encode(array($request->options1, $request->options2, $request->options3));
        } elseif ($request->nombre == "Respuesta múltiple") {

            $act_tipo = Activities_type::where('nombre', 'Respuesta múltiple')->get();
            $actividad->activity_type_id = $act_tipo[0]->id;
            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = json_encode([$request->respuesta1, $request->respuesta2, $request->respuesta3]);;
            $actividad->opciones = json_encode([$request->options1, $request->options2, $request->options3]);
        } elseif ($request->nombre == "Dar respuesta") {

            $act_tipo = Activities_type::where('nombre', 'Dar respuesta')->get();
            $actividad->activity_type_id = $act_tipo[0]->id;
            $actividad->enunciado = $request->descripcion;
            $actividad->opciones = json_encode([$request->opcion]);
        } elseif ($request->nombre == "Relación única") {

            $act_tipo = Activities_type::where('nombre', 'Relación única')->get();
            $actividad->activity_type_id = $act_tipo[0]->id;
            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = json_encode([$request->respuesta1, $request->respuesta2, $request->respuesta3, $request->respuesta4]);;
            $actividad->opciones = json_encode([$request->relacion1, $request->relacion2, $request->relacion3, $request->relacion4]);
        } elseif ($request->nombre == "Completar") {

            $act_tipo = Activities_type::where('nombre', 'Completar')->get();
            $actividad->activity_type_id = $act_tipo[0]->id;
            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = json_encode([$request->respuesta]);;
            $actividad->opciones = json_encode([$request->inicio, $request->final]);
        }

        if ($quiz_id == null) {

            $actividad->area = $request->area;
            $actividad->nivel = $request->nivel;
            $actividad->save();
            return redirect()->route('activity.index');
        } else {

            $prueba = Quiz::find($quiz_id);
            $actividad->area = $prueba->area;
            $actividad->nivel = $prueba->nivel;
            $actividad->save();
            return redirect()->route('quiz.activity.saveInQuiz', [$quiz_id, $actividad]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show($activity_id, $quiz_id = null)
    {
        $actividad = Activity::find($activity_id);
        $pruebas_keys = $actividad->quizzes->modelKeys();
        $niveles =  Grade::select('nombre')->get();
        $pruebas = DB::table('quizzes')
            ->where('area', '=', $actividad->area)
            ->orderBy('id', 'desc')->paginate(5);
        return view('activities.mostrarActividad', compact('pruebas', 'actividad', 'quiz_id'), compact('niveles', 'pruebas_keys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $activity_id)
    {
        $actividad = Activity::find($activity_id);

        if ($request->nombre == "Verdadero o Falso") {

            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = $request->respuesta;
        } elseif ($request->nombre == "Respuesta única") {

            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = json_encode(array($request->respuesta));;
            $actividad->opciones = json_encode(array($request->options1, $request->options2, $request->options3));
        } elseif ($request->nombre == "Respuesta múltiple") {

            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = json_encode([$request->respuesta1, $request->respuesta2, $request->respuesta3]);;
            $actividad->opciones = json_encode([$request->options1, $request->options2, $request->options3]);
        } elseif ($request->nombre == "Dar respuesta") {

            $actividad->enunciado = $request->descripcion;
            $actividad->opciones = json_encode([$request->opcion]);
        } elseif ($request->nombre == "Relación única") {

            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = json_encode([$request->respuesta1, $request->respuesta2, $request->respuesta3, $request->respuesta4]);;
            $actividad->opciones = json_encode([$request->relacion1, $request->relacion2, $request->relacion3, $request->relacion4]);
        } elseif ($request->nombre == "Completar") {

            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = json_encode([$request->respuesta]);;
            $actividad->opciones = json_encode([$request->inicio, $request->final]);
        }

        $actividad->area = $request->area;
        $actividad->nivel = $request->nivel;
        $actividad->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
