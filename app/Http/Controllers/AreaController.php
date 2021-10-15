<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function index()
    {
        $areas = DB::table('areas')
            ->orderBy('id', 'desc')->paginate(12);
        return view('area.indexArea', compact('areas'));
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                "nombre" => ['required'],
            ],
            [
                'required' => 'El :attribute es requerido.'
            ]
        );
        $area = new Area();
        $area->nombre = $request->nombre;
        $area->descripcion = $request->descripcion;
        $area->save();
        return redirect()->route('area.index');
    }


    public function update(Request $request,  $area_id)
    {
        $request->validate(
            [
                "nombre" => ['required'],
            ],
            [
                'required' => 'El :attribute es requerido.'
            ]
        );
        $area = Area::find($area_id);
        $area->nombre = $request->nombre;
        $area->descripcion = $request->descripcion;
        $area->save();
        return redirect()->route('area.index');
    }

    public function destroy($area_id)
    {
        $tipo = Area::find($area_id);
        $tipo->delete();
        return redirect()->back();
    }
}
