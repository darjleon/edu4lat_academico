<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ActivitiesQuizController;
use App\Http\Controllers\CourseBookController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstitutionController;
use Illuminate\Support\Facades\Route;

// Authentication routes
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, '__invoke'])->name('home.index');

    /*     Institucion     */
    Route::get('/institucion/index', [InstitutionController::class, 'index'])->name('institucion.index')
        ->middleware('permission:Ver_institución');
    Route::get('/institucion/editar/{institucion_id}', [InstitutionController::class, 'edit'])->name('institucion.edit')
        ->middleware('permission:Editar_institución');
    Route::post('/institucion/actualizar/{institucion_id}', [InstitutionController::class, 'update'])->name('institucion.update')
        ->middleware('permission:Editar_institución');

    /*     Curso     */
    Route::get('/curso/crear', [CourseController::class, 'create'])->name('course.create')
        ->middleware('permission:Crear_curso');
    Route::post('/curso/guardar', [CourseController::class, 'store'])->name('course.store')
        ->middleware('permission:Crear_curso');
    Route::get('/curso/mostrar/{curso_id}', [CourseController::class, 'show'])->name('course.show')
        ->middleware('permission:Ver_curso');
    Route::get('/curso/editar/{curso_id}', [CourseController::class, 'edit'])->name('course.edit')
        ->middleware('permission:Editar_curso');
    Route::post('/curso/actualizar/{curso_id}', [CourseController::class, 'update'])->name('course.update')
        ->middleware('permission:Editar_curso');
    Route::delete('/curso/eliminar/{libcurso_idro_id}', [CourseController::class, 'destroy'])->name('course.destroy')
        ->middleware('permission:Eliminar_curso');

    /*     Libro     */
    Route::get('/libro/index/{curso_id?}', [BookController::class, 'index'])->name('book.index')
        ->middleware('permission:Ver_libro');
    Route::get('/libro/crear/{curso_id?}', [BookController::class, 'create'])->name('book.create')
        ->middleware('permission:Crear_libro');
    Route::post('/libro/guardar/{curso_id?}', [BookController::class, 'store'])->name('book.store')
        ->middleware('permission:Crear_libro');
    Route::get('/libro/editar/{libro_id}', [BookController::class, 'edit'])->name('book.edit')
        ->middleware('permission:Editar_libro');
    Route::post('/libro/actualizar/{libro_id}', [BookController::class, 'update'])->name('book.update')
        ->middleware('permission:Editar_libro');
    Route::get('/libro/mostrar/{libro_id}', [BookController::class, 'show'])->name('book.show')
        ->middleware('permission:Ver_libro');
    Route::delete('/libro/eliminar/{libro_id}', [BookController::class, 'destroy'])->name('book.destroy')
        ->middleware('permission:Eliminar_libro');

    /*     Curso-Libros     */
    Route::get('/curso-libro/{curso_id}/{libro_id}', [CourseBookController::class, 'save'])->name('curso.libro.save')
        ->middleware('permission:Asignar_libro');

    /*     Prueba     */

    Route::get('/prueba/index/{libro_id?}', [QuizController::class, 'index'])->name('quiz.index')
        ->middleware('permission:Ver_prueba');
    Route::get('/prueba/crear/{libro_id?}', [QuizController::class, 'create'])->name('quiz.create')
        ->middleware('permission:Crear_prueba');
    Route::post('/prueba/guardar/{libro_id?}', [QuizController::class, 'store'])->name('quiz.store')
        ->middleware('permission:Crear_prueba');
    Route::get('/prueba/mostrar/{quiz_id}', [QuizController::class, 'show'])->name('quiz.show')
        ->middleware('permission:Ver_prueba');
    Route::get('/prueba/editar/{quiz_id}', [QuizController::class, 'edit'])->name('quiz.edit')
        ->middleware('permission:Editar_prueba');
    Route::post('/prueba/actualizar/{quiz_id}', [QuizController::class, 'update'])->name('quiz.update')
        ->middleware('permission:Editar_prueba');
    Route::delete('/prueba/eliminar/{quiz_id}', [QuizController::class, 'destroy'])->name('quiz.destroy')
        ->middleware('permission:Eliminar_prueba');

    /*     Actividades     */

    Route::get('/prueba/actividades/{quiz_id?}', [ActivityController::class, 'index'])->name('activity.index')
        ->middleware('permission:Ver_actividad');
    Route::get('/prueba/actividades/crear/{quiz_id?}', [ActivityController::class, 'create'])->name('activity.create')
        ->middleware('permission:Crear_actividad');
    Route::post('/prueba/actividades/guardar/{quiz_id?}', [ActivityController::class, 'store'])->name('activity.store')
        ->middleware('permission:Crear_actividad');
    Route::get('/prueba/actividades/mostrar/{activity_id}/{quiz_id?}', [ActivityController::class, 'show'])->name('activity.show')
        ->middleware('permission:Ver_actividad');
    Route::get('/prueba/actividades/editar/{activity_id}', [ActivityController::class, 'edit'])->name('activity.edit')
        ->middleware('permission:Editar_actividad');
    Route::post('/prueba/actividades/actualizar/{activity_id}', [ActivityController::class, 'update'])->name('activity.update')
        ->middleware('permission:Editar_actividad');
    Route::delete('/prueba/actividades/eliminar/{activity_id}', [ActivityController::class, 'destroy'])->name('activity.destroy')
        ->middleware('permission:Eliminar_actividad');

    /*     Prueba-Actividades     */
    Route::get('/prueba-actividad/{quiz_id}/{activity_id}', [ActivitiesQuizController::class, 'saveInQuiz'])->name('quiz.activity.saveInQuiz')
        ->middleware('permission:Asignar_actividad');
    Route::get('/actividad-prueba/{quiz_id}/{activity_id}/{lugar_quiz?}', [ActivitiesQuizController::class, 'saveInActivity'])->name('quiz.activity.saveInActivity')
        ->middleware('permission:Asignar_actividad');
});
