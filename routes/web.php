<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ActivitiesQuizController;
use App\Http\Controllers\CourseBookController;
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

    /*     Libro     */
    Route::get('/libro/index/{curso_id?}', [BookController::class, 'index'])->name('book.index');
    Route::get('/libro/crear/{curso_id?}', [BookController::class, 'create'])->name('book.create');
    Route::post('/libro/guardar/{curso_id?}', [BookController::class, 'store'])->name('book.store');
    /*  Route::get('/libro/mostrar/{libro_id}', [BookController::class, 'show'])->name('book.show');
    Route::get('/libro/editar/{libro_id}', [BookController::class, 'edit'])->name('book.edit');
    Route::post('/libro/actualizar/{libro_id}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/libro/eliminar/{libro_id}', [BookController::class, 'destroy'])->name('book.destroy');
 */
    /*     Curso-Libros     */
    Route::get('/curso-libro/{curso_id}/{libro_id}', [CourseBookController::class, 'save'])->name('curso.libro.save');

    /*     Prueba     */

    Route::get('/prueba/index/{libro_id?}', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/prueba/crear/{libro_id?}', [QuizController::class, 'create'])->name('quiz.create');
    Route::post('/prueba/guardar/{libro_id?}', [QuizController::class, 'store'])->name('quiz.store');
    Route::get('/prueba/mostrar/{quiz_id}', [QuizController::class, 'show'])->name('quiz.show');
    Route::get('/prueba/editar/{quiz_id}', [QuizController::class, 'edit'])->name('quiz.edit');
    Route::post('/prueba/actualizar/{quiz_id}', [QuizController::class, 'update'])->name('quiz.update');
    Route::delete('/prueba/eliminar/{quiz_id}', [QuizController::class, 'destroy'])->name('quiz.destroy');

    /*     Actividades     */

    Route::get('/prueba/actividades/{quiz_id?}', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('/prueba/actividades/crear/{quiz_id?}', [ActivityController::class, 'create'])->name('activity.create');
    Route::post('/prueba/actividades/guardar/{quiz_id?}', [ActivityController::class, 'store'])->name('activity.store');
    Route::get('/prueba/actividades/mostrar/{activity_id}/{quiz_id?}', [ActivityController::class, 'show'])->name('activity.show');
    Route::get('/prueba/actividades/editar/{activity_id}', [ActivityController::class, 'edit'])->name('activity.edit');
    Route::post('/prueba/actividades/actualizar/{activity_id}', [ActivityController::class, 'update'])->name('activity.update');
    /*     Route::delete('/prueba/actividades/eliminar/{activity_id}', [ActivityController::class, 'destroy'])->name('activity.destroy');
 */
    /*     Prueba-Actividades     */
    Route::get('/prueba-actividad/{quiz_id}/{activity_id}', [ActivitiesQuizController::class, 'saveInQuiz'])->name('quiz.activity.saveInQuiz');
    Route::get('/actividad-prueba/{quiz_id}/{activity_id}/{lugar_quiz?}', [ActivitiesQuizController::class, 'saveInActivity'])->name('quiz.activity.saveInActivity');
});
