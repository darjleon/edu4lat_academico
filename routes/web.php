<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ActivitiesQuizController;
use App\Http\Controllers\CourseBookController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseUserController;
use Illuminate\Support\Facades\Route;

// Authentication routes
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, '__invoke'])->name('home.index');

    /*     Usuarios     */

    Route::get('/usuario', [UserController::class, 'index'])
        ->name('usuario.index')
        ->middleware('permission:Ver_usuario');
    Route::get('/usuario/perfil/{user_id}', [UserController::class, 'show'])
        ->name('usuario.show')
        ->middleware('permission:Ver_usuario');
    Route::post('/usuario/guardar', [UserController::class, 'store'])
        ->name('usuario.store')
        ->middleware('permission:Crear_usuario');
    Route::post('/usuario/actualizar/{user_id}', [UserController::class, 'update'])
        ->name('usuario.update')
        ->middleware('permission:Editar_usuario');
    Route::delete('/usuario/eliminar/{user_id}', [UserController::class, 'destroy'])
        ->name('usuario.destroy')
        ->middleware('permission:Eliminar_usuario');

    /*     Institucion     */
    Route::get('/institucion/index', [InstitutionController::class, 'index'])
        ->name('institucion.index')
        ->middleware('permission:Ver_institución');
    Route::get('/institucion/editar/{institucion_id}', [InstitutionController::class, 'edit'])
        ->name('institucion.edit')
        ->middleware('permission:Editar_institución');
    Route::post('/institucion/actualizar/{institucion_id}', [InstitutionController::class, 'update'])
        ->name('institucion.update')
        ->middleware('permission:Editar_institución');

    /*     Curso     */
    Route::get('/curso/index', [CourseController::class, 'index'])
        ->name('course.index')
        ->middleware('permission:Editar_curso');
    Route::get('/curso/crear', [CourseController::class, 'create'])
        ->name('course.create')
        ->middleware('permission:Crear_curso');
    Route::post('/curso/guardar', [CourseController::class, 'store'])
        ->name('course.store')
        ->middleware('permission:Crear_curso');
    Route::get('/curso/mostrar/{curso_id}', [CourseController::class, 'show'])
        ->name('course.show')
        ->middleware('permission:Ver_curso');
    Route::get('/curso/editar/{curso_id}', [CourseController::class, 'edit'])
        ->name('course.edit')
        ->middleware('permission:Editar_curso');
    Route::post('/curso/actualizar/{curso_id}', [CourseController::class, 'update'])
        ->name('course.update')
        ->middleware('permission:Editar_curso');
    Route::delete('/curso/eliminar/{libcurso_idro_id}', [CourseController::class, 'destroy'])
        ->name('course.destroy')
        ->middleware('permission:Eliminar_curso');

    /*     Libro     */
    Route::get('/libro/index/{curso_id?}', [BookController::class, 'index'])
        ->name('book.index')
        ->middleware('permission:Ver_libro');
    Route::get('/libro/crear/{curso_id?}', [BookController::class, 'create'])
        ->name('book.create')
        ->middleware('permission:Crear_libro');
    Route::post('/libro/guardar/{curso_id?}', [BookController::class, 'store'])
        ->name('book.store')
        ->middleware('permission:Crear_libro');
    Route::get('/libro/editar/{libro_id}/{curso_id?}', [BookController::class, 'edit'])
        ->name('book.edit')
        ->middleware('permission:Editar_libro');
    Route::post('/libro/actualizar/{libro_id}/{curso_id?}', [BookController::class, 'update'])
        ->name('book.update')
        ->middleware('permission:Editar_libro');
    Route::get('/libro/mostrar/{libro_id}/{curso_id?}', [BookController::class, 'show'])
        ->name('book.show')
        ->middleware('permission:Ver_libro');
    Route::delete('/libro/eliminar/{libro_id}', [BookController::class, 'destroy'])
        ->name('book.destroy')
        ->middleware('permission:Eliminar_libro');

    /*     Curso-Libros     */
    Route::get('/curso/libro/guardar/{curso_id}/{libro_id}/{docente_id?}', [CourseBookController::class, 'save'])
        ->name('curso.libro.save')
        ->middleware('permission:Asignar_libro');
    Route::get('/curso/libro/actualizar/{curso_id}/{libro_id}/{docente_id?}', [CourseBookController::class, 'saveUpdate'])
        ->name('curso.libro.update')
        ->middleware('permission:Asignar_libro');
    Route::post('/curso/libro/relación/guardar/{libro_id}', [CourseBookController::class, 'guardar'])
        ->name('curso.libro.guardar')
        ->middleware('permission:Asignar_libro');
    Route::delete('/curso/libro/relación/borrar/{curso_id}/{libro_id}', [CourseBookController::class, 'destroy'])
        ->name('curso.libro.borrar')
        ->middleware('permission:Asignar_libro');

    /*     Estudiantes_Cursos     */
    Route::get('/curso/estudiantes/index', [CourseUserController::class, 'index'])
        ->name('student.index')
        ->middleware('permission:Asignar_estudiante');
    Route::post('/curso/estudiantes/guardar', [CourseUserController::class, 'store'])
        ->name('student.store')
        ->middleware('permission:Asignar_estudiante');
    /* Route::post('/curso/estudiantes/actualizar/{type_id}', [CourseUserController::class, 'update'])
        ->name('student.update')
        ->middleware('permission:Asignar_estudiante'); */
    Route::delete('/curso/estudiantes/eliminar/{type_id}', [CourseUserController::class, 'destroy'])
        ->name('student.destroy')
        ->middleware('permission:Asignar_estudiante');

    /*     Prueba     */

    Route::get('/prueba/index/{libro_id?}', [QuizController::class, 'index'])
        ->name('quiz.index')
        ->middleware('permission:Ver_prueba');
    Route::get('/prueba/crear/{libro_id?}', [QuizController::class, 'create'])
        ->name('quiz.create')
        ->middleware('permission:Crear_prueba');
    Route::post('/prueba/guardar/{libro_id?}', [QuizController::class, 'store'])
        ->name('quiz.store')
        ->middleware('permission:Crear_prueba');
    Route::get('/prueba/mostrar/{quiz_id}', [QuizController::class, 'show'])
        ->name('quiz.show')
        ->middleware('permission:Ver_prueba');
    Route::get('/prueba/editar/{quiz_id}', [QuizController::class, 'edit'])
        ->name('quiz.edit')
        ->middleware('permission:Editar_prueba');
    Route::post('/prueba/actualizar/{quiz_id}', [QuizController::class, 'update'])
        ->name('quiz.update')
        ->middleware('permission:Editar_prueba');
    Route::delete('/prueba/eliminar/{quiz_id}', [QuizController::class, 'destroy'])
        ->name('quiz.destroy')
        ->middleware('permission:Eliminar_prueba');

    /*     Actividades     */

    Route::get('/prueba/actividades/{quiz_id?}', [ActivityController::class, 'index'])
        ->name('activity.index')
        ->middleware('permission:Ver_actividad');
    Route::get('/prueba/actividades/crear/{quiz_id?}', [ActivityController::class, 'create'])
        ->name('activity.create')
        ->middleware('permission:Crear_actividad');
    Route::post('/prueba/actividades/guardar/{quiz_id?}', [ActivityController::class, 'store'])
        ->name('activity.store')
        ->middleware('permission:Crear_actividad');
    Route::get('/prueba/actividades/mostrar/{activity_id}/{quiz_id?}', [ActivityController::class, 'show'])
        ->name('activity.show')
        ->middleware('permission:Ver_actividad');
    Route::get('/prueba/actividades/editar/{activity_id}', [ActivityController::class, 'edit'])
        ->name('activity.edit')
        ->middleware('permission:Editar_actividad');
    Route::post('/prueba/actividades/actualizar/{activity_id}', [ActivityController::class, 'update'])
        ->name('activity.update')
        ->middleware('permission:Editar_actividad');
    Route::delete('/prueba/actividades/eliminar/{activity_id}', [ActivityController::class, 'destroy'])
        ->name('activity.destroy')
        ->middleware('permission:Eliminar_actividad');

    /*     Prueba-Actividades     */
    Route::get('/prueba-actividad/{quiz_id}/{activity_id}', [ActivitiesQuizController::class, 'saveInQuiz'])
        ->name('quiz.activity.saveInQuiz')
        ->middleware('permission:Asignar_actividad');
    Route::get('/actividad-prueba/{quiz_id}/{activity_id}/{lugar_quiz?}', [ActivitiesQuizController::class, 'saveInActivity'])
        ->name('quiz.activity.saveInActivity')
        ->middleware('permission:Asignar_actividad');

    /*     Areas     */

    Route::get('/area', [AreaController::class, 'index'])
        ->name('area.index')
        ->middleware('permission:Ver_area');
    Route::post('/area/guardar', [AreaController::class, 'store'])
        ->name('area.store')
        ->middleware('permission:Crear_area');
    Route::post('/area/actualizar/{type_id}', [AreaController::class, 'update'])
        ->name('area.update')
        ->middleware('permission:Editar_area');
    Route::delete('/area/eliminar/{type_id}', [AreaController::class, 'destroy'])
        ->name('area.destroy')
        ->middleware('permission:Eliminar_area');
});
