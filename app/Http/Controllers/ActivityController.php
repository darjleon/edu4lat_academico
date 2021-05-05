<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use App\Models\Activities_type;
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
        $actividades = DB::table('activities')
            ->orderBy('id', 'desc')->paginate(6);
        $act_tipo = Activities_type::all();
        return view('activities.administrarActividades', compact('actividades'), compact('act_tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->nombre == "Verdadero o Falso") {

            $act_tipo = Activities_type::where('nombre', 'Verdadero o Falso')->get();
            $actividad = new Activity();
            $actividad->activity_type_id = $act_tipo[0]->id;
            $actividad->area = 'nada';
            $actividad->nivel = 'nada';
            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = $request->respuesta;
            $actividad->save();
            return redirect()->route('activity.index');
        } elseif ($request->nombre == "Escojer la opcion correcta") {

            $act_tipo = Activities_type::where('nombre', 'Escojer la opcion correcta')->get();
            $actividad = new Activity();
            $actividad->activity_type_id = $act_tipo[0]->id;
            $actividad->area = 'nada';
            $actividad->nivel = 'nada';
            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = json_encode([$request->respuesta]);;
            $actividad->opciones = json_encode([$request->options1, $request->options2, $request->options3]);
            $actividad->save();
            return redirect()->route('activity.index');
        } elseif ($request->nombre == "Escojer las opciones correctas") {

            $act_tipo = Activities_type::where('nombre', 'Escojer las opciones correctas')->get();
            $actividad = new Activity();
            $actividad->activity_type_id = $act_tipo[0]->id;
            $actividad->area = 'nada';
            $actividad->nivel = 'nada';
            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = json_encode([$request->respuesta1, $request->respuesta2, $request->respuesta3]);;
            $actividad->opciones = json_encode([$request->options1, $request->options2, $request->options3]);
            $actividad->save();
            return redirect()->route('activity.index');
        } elseif ($request->nombre == "Responder la pregunta") {

            $act_tipo = Activities_type::where('nombre', 'Responder la pregunta')->get();
            $actividad = new Activity();
            $actividad->activity_type_id = $act_tipo[0]->id;
            $actividad->area = 'nada';
            $actividad->nivel = 'nada';
            $actividad->enunciado = $request->descripcion;
            $actividad->opciones = json_encode([$request->opcion]);
            $actividad->save();
            return redirect()->route('activity.index');
        } elseif ($request->nombre == "Relacionar las palabras") {

            $act_tipo = Activities_type::where('nombre', 'Relacionar las palabras')->get();
            $actividad = new Activity();
            $actividad->activity_type_id = $act_tipo[0]->id;
            $actividad->area = 'nada';
            $actividad->nivel = 'nada';
            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = json_encode([$request->respuesta1, $request->respuesta2, $request->respuesta3, $request->respuesta4]);;
            $actividad->opciones = json_encode([$request->relacion1, $request->relacion2, $request->relacion3, $request->relacion4]);
            $actividad->save();
            return redirect()->route('activity.index');
        } elseif ($request->nombre == "Completar la frase") {

            $act_tipo = Activities_type::where('nombre', 'Completar la frase')->get();
            $actividad = new Activity();
            $actividad->activity_type_id = $act_tipo[0]->id;
            $actividad->area = 'nada';
            $actividad->nivel = 'nada';
            $actividad->enunciado = $request->descripcion;
            $actividad->respuesta = json_encode([$request->respuesta]);;
            $actividad->opciones = json_encode([$request->inicio, $request->final]);
            $actividad->save();
            return redirect()->route('activity.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        //
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
