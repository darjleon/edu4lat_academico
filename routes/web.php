<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

// Authentication routes
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, '__invoke'])->name('home.index');
    Route::get('/prueba/index/{id?}', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/prueba/crear/{id?}', [QuizController::class, 'create'])->name('quiz.create');
    Route::post('/prueba/guardar', [QuizController::class, 'store'])->name('quiz.store');
    Route::get('/prueba/mostrar/{id}', [QuizController::class, 'show'])->name('quiz.show');
    Route::get('/prueba/editar/{id}', [QuizController::class, 'edit'])->name('quiz.edit');
    Route::post('/prueba/actualizar/{id}', [QuizController::class, 'update'])->name('quiz.update');
    Route::delete('/prueba/eliminar/{id}', [QuizController::class, 'destroy'])->name('quiz.destroy');
    Route::get('/show-activities', [ActivitiesController::class, 'show_activities'])->name('show_activities');
    Route::get('/true-or-false', [ActivitiesController::class, 'create_trueorfalse'])->name('act_true_or_false');
    Route::get('/complete', [ActivitiesController::class, 'create_complete'])->name('act_complete');
    Route::get('/select-the-correct', [ActivitiesController::class, 'create_select_correct'])->name('act_select');
    Route::get('/prueba/actividades/crear', [ActivityController::class, 'index'])->name('activity.index');
});
