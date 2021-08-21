<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Course_User;
use App\Models\User;
use Illuminate\Http\Request;

class CourseUserController extends Controller
{

    public function index()
    {
        $estudiantes = User::role('Estudiante')->paginate(25);
        $cursos = Course::all();
        return view('users.asignarStudent', compact('estudiantes', 'cursos'));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                "curso" => ['required'],
                "estudiante" => ['required',],
            ],
            [
                'required' => 'El :attribute es requerido.'
            ]
        );
        $relacion = Course_User::where('curso_id', $request->curso)->where('usuario_id', $request->estudiante)->first();

        if (empty($relacion)) {
            $curso_estudiante = new Course_User;
            $curso_estudiante->curso_id = $request->curso;
            $curso_estudiante->usuario_id = $request->estudiante;
            $curso_estudiante->save();
        }

        return redirect()->route('student.index');
    }

    public function update(Request $request,  $course_User)
    {
        return redirect()->route('student.index');
    }

    public function destroy($course_User_id)
    {
        $relacion = Course_User::find($course_User_id);
        $relacion->delete();
        return redirect()->back();
    }
}
