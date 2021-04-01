<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function index()
    {
        return view('quiz.opcionQuiz');
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
