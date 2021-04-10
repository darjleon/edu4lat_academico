<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Rules\TiempoConSentido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class QuizController extends Controller
{

    public function index($curso_id = null)
    {
        $usuario_id = Auth::id();
        $usuario = User::find($usuario_id);
        if ($curso_id == null) {
            $pruebas = DB::table('quizzes')->where('creador_id', '=', $usuario_id)
                ->orderBy('id', 'desc')->paginate(5);
            return view('quiz.opcionQuiz', compact('pruebas', 'curso_id'), compact('usuario'));
        }

        $pruebas = DB::table('quizzes')->where('creador_id', '=', $usuario_id)
            ->where('curso', 'like', '%' . $curso_id . '%')
            ->orderBy('id', 'desc')->paginate(5);

        return view('quiz.opcionQuiz', compact('pruebas', 'curso_id'), compact('usuario'));
    }


    public function create($curso_id = null)
    {
        $niveles = DB::getEnumValues('quizzes', 'nivel');
        $areas = DB::getEnumValues('quizzes', 'area');
        $cursos = ['Alfa', 'Omega', 'Gama'];
        return view('quiz.crearQuiz', compact('niveles', 'areas'), compact('cursos', 'curso_id'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "titulo" => ['required'],
                "area" => ['required'],
                "nivel" => ['required'],
                "hora_de_inicio" => ['required'],
                "hora_de_cierre" => ['required', new TiempoConSentido($request->hora_de_inicio)],
                "fecha" => ['required']
            ],
            [
                'required' => 'El :attribute es requerido.'
            ]
        );
        $nuevaPrueba = new Quiz();
        $nuevaPrueba->creador_id = Auth::id();
        $nuevaPrueba->titulo = $request->titulo;
        $nuevaPrueba->area = $request->area;
        $nuevaPrueba->curso .= $request->curso;
        $nuevaPrueba->nivel = $request->nivel;
        $nuevaPrueba->descripcion = $request->descripcion;
        $nuevaPrueba->fecha = $request->fecha;
        $nuevaPrueba->inicio = $request->hora_de_inicio;
        $nuevaPrueba->fin = $request->hora_de_cierre;
        $nuevaPrueba->save();

        return redirect()->route('activity.index');
    }

    public function show($quizId)
    {
        $prueba = Quiz::find($quizId);
        return view('quiz.mostrarQuiz', compact('prueba'));
    }

    public function edit($quizId)
    {
        $prueba = Quiz::find($quizId);
        $niveles = DB::getEnumValues('quizzes', 'nivel');
        $areas = DB::getEnumValues('quizzes', 'area');
        $cursos = ['Alfa', 'Omega', 'Gama'];
        return view('quiz.editarQuiz', compact('niveles', 'areas'), compact('prueba', 'cursos'));
    }

    public function update(Request $request, $quizId)
    {
        $request->validate(
            [
                "titulo" => ['required'],
                "area" => ['required'],
                "nivel" => ['required'],
                "hora_de_inicio" => ['required'],
                "hora_de_cierre" => ['required', new TiempoConSentido($request->hora_de_inicio)],
                "fecha" => ['required']
            ],
            [
                'required' => 'El :attribute es requerido.'
            ]
        );
        $pruebaEditada = Quiz::find($quizId);
        $pruebaEditada->titulo = $request->titulo;
        $pruebaEditada->area = $request->area;
        $pruebaEditada->nivel = $request->nivel;
        $pruebaEditada->curso = $request->curso;
        $pruebaEditada->descripcion = $request->descripcion;
        $pruebaEditada->fecha = $request->fecha;
        $pruebaEditada->inicio = $request->hora_de_inicio;
        $pruebaEditada->fin = $request->hora_de_cierre;
        $pruebaEditada->save();

        return redirect()->route('quiz.index');
    }

    public function destroy($quizId)
    {
        $prueba = Quiz::find($quizId);
        $prueba->delete();
        return redirect()->route('quiz.index');
    }
}
