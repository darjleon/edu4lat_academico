<?php

namespace App\Http\Controllers;

use App\Models\Activities_Quiz;
use App\Models\Area;
use App\Models\Book;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Quiz;
use App\Models\User;
use App\Rules\TiempoConSentido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class QuizController extends Controller
{

    public function index($libro_id = null)
    {
        $usuario_id = Auth::id();
        $usuario = User::find($usuario_id);
        $libros = Book::all();
        if ($libro_id == null) {
            $pruebas = DB::table('quizzes')
                ->where('creador_id', '=', $usuario_id)
                ->orderBy('id', 'desc')->paginate(5);
            return view('quiz.opcionQuiz', compact('pruebas', 'libro_id'), compact('usuario', 'libros'));
        }

        $pruebas = DB::table('quizzes')
            ->where('libro_id', '=', $libro_id)
            ->orderBy('id', 'desc')->paginate(5);

        return view('quiz.opcionQuiz', compact('pruebas', 'libro_id'), compact('usuario', 'libros'));
    }


    public function create($libro_id = null)
    {
        $niveles =  Grade::select('nombre')->get();
        $areas =  Area::select('nombre')->get();
        if ($libro_id == null) {
            $libros = Book::select('id', 'titulo', 'area', 'nivel')->get();
        } else {
            $libros = Book::find($libro_id);
        }

        return view('quiz.crearQuiz', compact('niveles', 'areas'), compact('libros', 'libro_id'));
    }

    public function store(Request $request, $libro_id = null)
    {
        $request->validate(
            [
                "titulo" => ['required'],
                "libro" => ['required'],
                "hora_de_cierre" => [new TiempoConSentido($request->hora_de_inicio)]
            ],
            [
                'required' => 'El :attribute es requerido.'
            ]
        );
        $libro = Book::find($request->libro);
        $nuevaPrueba = new Quiz();
        $nuevaPrueba->libro_id = $request->libro;
        $nuevaPrueba->creador_id = Auth::id();
        $nuevaPrueba->titulo = $request->titulo;
        $nuevaPrueba->area = $libro->area;
        $nuevaPrueba->nivel = $libro->nivel;
        $nuevaPrueba->descripcion = $request->descripcion;
        $nuevaPrueba->fecha = $request->fecha;
        $nuevaPrueba->inicio = $request->hora_de_inicio;
        $nuevaPrueba->fin = $request->hora_de_cierre;
        $nuevaPrueba->save();

        return redirect()->route('activity.index', $nuevaPrueba);
    }

    public function show($quizId)
    {
        $prueba = Quiz::find($quizId);
        $libro = Book::find($prueba->libro_id);
        $actividades = $prueba->activities;
        return view('quiz.mostrarQuiz', compact('prueba', 'libro'), compact('actividades'));
    }

    public function edit($quizId)
    {
        $prueba = Quiz::find($quizId);
        $niveles =  Grade::select('nombre')->get();
        $areas =  Area::select('nombre')->get();
        $libros = Book::select('id', 'titulo', 'area', 'nivel')->get();
        return view('quiz.editarQuiz', compact('niveles', 'areas'), compact('prueba', 'libros'));
    }

    public function update(Request $request, $quizId)
    {
        $request->validate(
            [
                "titulo" => ['required'],
                "libro" => ['required'],
                "hora_de_cierre" => [new TiempoConSentido($request->hora_de_inicio)],
            ],
            [
                'required' => 'El :attribute es requerido.'
            ]
        );
        $libro = Book::find($request->libro);
        $pruebaEditada = Quiz::find($quizId);
        $pruebaEditada->titulo = $request->titulo;
        $pruebaEditada->area = $libro->area;
        $pruebaEditada->nivel = $libro->nivel;
        $pruebaEditada->libro_id = $request->libro;
        $pruebaEditada->descripcion = $request->descripcion;
        $pruebaEditada->fecha = $request->fecha;
        $pruebaEditada->inicio = $request->hora_de_inicio;
        $pruebaEditada->fin = $request->hora_de_cierre;
        $pruebaEditada->save();

        return redirect()->route('activity.index', $quizId);
    }

    public function destroy($quizId)
    {
        $prueba = Quiz::find($quizId);
        $prueba->delete();
        return redirect()->route('quiz.index');
    }
}
