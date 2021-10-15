<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstitutionController extends Controller
{
    public function index()
    {
        $institucion = Institution::first();
        return view('institution.homeInstitution', compact('institucion'));
    }
    public function edit($institucion_id)
    {
        $institucion = Institution::find($institucion_id);
        return view('institution.editInstitution', compact('institucion'));
    }
    public function update(Request $request, $institucion_id)
    {
        $request->validate(
            [
                "nombre" => ['required'],
                "logo" => ['image', 'max:2048', 'mimes:jpeg,png,jpg,gif,svg'],
            ],
            [
                'required' => 'El :attribute de la institución es requerido.',
                'image' => 'El :attribute debe ser una imagen.',
                'mimes' => 'El :attribute debe tener ser del tipo: :values.',
                'max' => 'El :attribute debe pesar menos de :max KB.',
            ]
        );
        $institucion = Institution::find($institucion_id);

        $institucion->nombre = $request->nombre;
        $institucion->descripcion = $request->descripcion;
        $institucion->frase = $request->frase;
        $institucion->direccion = $request->direccion;
        $institucion->ciudad = $request->ciudad;
        $institucion->provincia = $request->provincia;
        $institucion->parroquia = $request->parroquia;
        $institucion->indicaciones_extra = $request->indicaciones_extra;
        $institucion->web = $request->web;
        $institucion->facebook = $request->facebook;
        $institucion->twitter = $request->twitter;
        $institucion->instagram = $request->instagram;
        $institucion->youtube = $request->youtube;
        $institucion->correo = $request->correo;
        $institucion->telefono = $request->telefono;
        $institucion->celular = $request->celular;

        if ($institucion->logo != null && $request->hasFile('logo')) {
            unlink('storage/institucion/' . $institucion->logo);
            $institucion->logo = null;
        }

        if ($request->hasFile('logo')) {
            $imagen = str_replace(" ", "_", $request->nombre) . '.' . time() . '.' . $request->file('logo')->getClientOriginalExtension();
            $institucion->logo = $imagen;
            $request->logo->storeAs('public/institucion', $imagen);
        }
        $institucion->save();
        return redirect()->route('institucion.index');
    }
}
