<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Institution;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $cursos = Course::paginate(8);
        return view('courses.indexCourse', compact('cursos'));
    }
    public function create()
    {
        return view('courses.crearCourse');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "nombre" => ['required'],
            ],
            [
                'required' => 'El :attribute del curso es requerido.'
            ]
        );
        $newCurso = new Course();
        $newCurso->institucion_id = Institution::first()->id;
        $newCurso->nombre = $request->nombre;
        $newCurso->descripcion = $request->descripcion;
        $newCurso->save();
        return redirect()->route('course.show', $newCurso->id);
    }


    public function show($course_id)
    {
        $curso = Course::find($course_id);
        return view('courses.mostrarCourse', compact('curso'));
    }


    public function edit($course_id)
    {
        $curso = Course::find($course_id);
        return view('courses.editarCourse', compact('curso'));
    }


    public function update(Request $request,  $course_id)
    {
        $request->validate(
            [
                "nombre" => ['required'],
            ],
            [
                'required' => 'El :attribute del curso es requerido.'
            ]
        );
        $editCurso = Course::find($course_id);
        $editCurso->nombre = $request->nombre;
        $editCurso->descripcion = $request->descripcion;
        $editCurso->save();
        return redirect()->route('course.show', $course_id);
    }

    public function destroy($course_id)
    {
        $curso = Course::find($course_id);
        $curso->delete();
        return redirect()->back();
    }
}
