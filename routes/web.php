<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

// Authentication routes
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, '__invoke'])->name('home.index');
    Route::get('/prueba', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/prueba/crear', [QuizController::class, 'create'])->name('quiz.create');
});
