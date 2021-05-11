<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivitiesQuizController;
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

    /*     Prueba     */

    Route::get('/prueba/index/{id?}', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/prueba/crear/{id?}', [QuizController::class, 'create'])->name('quiz.create');
    Route::post('/prueba/guardar/{id?}', [QuizController::class, 'store'])->name('quiz.store');
    Route::get('/prueba/mostrar/{id}', [QuizController::class, 'show'])->name('quiz.show');
    Route::get('/prueba/editar/{id}', [QuizController::class, 'edit'])->name('quiz.edit');
    Route::post('/prueba/actualizar/{id}', [QuizController::class, 'update'])->name('quiz.update');
    Route::delete('/prueba/eliminar/{id}', [QuizController::class, 'destroy'])->name('quiz.destroy');

    /*     Actividades     */

    Route::get('/prueba/actividades/{id?}', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('/prueba/actividades/crear/{id?}', [ActivityController::class, 'create'])->name('activity.create');
    Route::post('/prueba/actividades/guardar/{id?}', [ActivityController::class, 'store'])->name('activity.store');
    Route::get('/prueba/actividades/mostrar/{id}/{quizid?}', [ActivityController::class, 'show'])->name('activity.show');
    Route::get('/prueba/actividades/editar/{id}', [ActivityController::class, 'edit'])->name('activity.edit');
    Route::post('/prueba/actividades/actualizar/{id}', [ActivityController::class, 'update'])->name('activity.update');
    Route::delete('/prueba/actividades/eliminar/{id}', [ActivityController::class, 'destroy'])->name('activity.destroy');

    /*     Prueba-Actividades     */
    Route::get('/prueba-actividad/{quiz_id}/{activity_id}', [ActivitiesQuizController::class, 'saveInQuiz'])->name('quiz.activity.saveInQuiz');
    Route::get('/actividad-prueba/{quiz_id}/{activity_id}/{lugar?}', [ActivitiesQuizController::class, 'saveInActivity'])->name('quiz.activity.saveInActivity');
});
