<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class QuizController extends Controller
{

    public function index()
    {
        $pruebas = DB::table('quizzes')
            ->orderBy('id', 'desc')->paginate(10);
        $usuarios = User::all();
        return view('quiz.opcionQuiz', compact('pruebas'), compact('usuarios'));
    }

    public function create()
    {
        return view('quiz.crearQuiz');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Quiz $quiz)
    {
        //
    }

    public function edit(Quiz $quiz)
    {
        //
    }

    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    public function destroy(Quiz $quiz)
    {
        //
    }
}
