<!-- https://github.com/diglactic/laravel-breadcrumbs -->
<?php // routes/breadcrumbs.php

use App\Models\Book;
use App\Models\Course;
use App\Models\Quiz;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Facades\Auth;

// Notificaciones
Breadcrumbs::for('notificaciones', function (BreadcrumbTrail $trail) {
    $trail->push('Notificaciones', route('home.index'));
});

// Usuarios
Breadcrumbs::for('Usuarios', function (BreadcrumbTrail $trail) {
    $trail->push('Usuarios', route('usuario.index'));
});

// Usuarios > [Perfil]
Breadcrumbs::for('Usuario.perfil', function (BreadcrumbTrail $trail, $usuario) {
    $trail->parent('Usuarios');
    $trail->push($usuario->name, route('usuario.show', $usuario->id));
});

// Estudiantes
Breadcrumbs::for('Estudiantes', function (BreadcrumbTrail $trail) {
    $trail->push('Estudiantes', route('student.index'));
});

// Areas
Breadcrumbs::for('Areas', function (BreadcrumbTrail $trail) {
    $trail->push('Areas', route('area.index'));
});

// Cursos
Breadcrumbs::for('Cursos', function (BreadcrumbTrail $trail) {
    $trail->push('Cursos', route('course.index'));
});

// Cursos > Crear
Breadcrumbs::for('Curso.crear', function (BreadcrumbTrail $trail) {
    $trail->parent('Cursos');
    $trail->push('Crear', route('course.create'));
});

// Curso o Cursos > [Curso]
Breadcrumbs::for('Curso.home', function (BreadcrumbTrail $trail, $curso) {
    if (Auth::user()->hasPermissionTo('Editar_curso')) {
        $trail->parent('Cursos');
    }
    $trail->push($curso->nombre, route('course.show', $curso->id));
});

// Cursos > [Curso] > Editar
Breadcrumbs::for('Curso.home.edit', function (BreadcrumbTrail $trail, $curso) {
    $trail->parent('Curso.home', $curso);
    $trail->push('Editar', route('course.edit', $curso->id));
});

// Libros o Cursos > [Curso] > Libros
Breadcrumbs::for('Libros', function (BreadcrumbTrail $trail, $curso_id) {
    if ($curso_id != null) {
        $trail->parent('Curso.home', Course::find($curso_id));
    }
    $trail->push('Libros', route('book.index', $curso_id));
});

// Libros > Crear
Breadcrumbs::for('Libros.crear', function (BreadcrumbTrail $trail, $curso_id) {
    $trail->parent('Libros', $curso_id);
    $trail->push('Crear', route('book.create', $curso_id));
});

// Libros > [Libro]
Breadcrumbs::for('Libros.ver', function (BreadcrumbTrail $trail, $libro, $curso_id) {
    $trail->parent('Libros', $curso_id);
    $trail->push($libro->titulo, route('book.show', ['libro_id' => $libro->id, 'curso_id' => $curso_id]));
});

// Libros > [Libro] > Editar
Breadcrumbs::for('Libro.edit', function (BreadcrumbTrail $trail, $libro, $curso_id) {
    $trail->parent('Libros.ver', $libro, $curso_id);
    $trail->push('Editar', route('book.edit', ['libro_id' => $libro->id, 'curso_id' => $curso_id]));
});

// Pruebas o Libros > [Libro] > Pruebas
Breadcrumbs::for('Pruebas', function (BreadcrumbTrail $trail, $libro_id) {
    if ($libro_id != null) {
        $trail->parent('Libros.ver', Book::find($libro_id), null);
    }
    $trail->push('Pruebas', route('quiz.index', $libro_id));
});

// Pruebas > Crear
Breadcrumbs::for('Pruebas.crear', function (BreadcrumbTrail $trail, $libro_id) {
    $trail->parent('Pruebas', $libro_id);
    $trail->push('Crear', route('quiz.create', $libro_id));
});

// Pruebas > Editar: [Prueba] 
Breadcrumbs::for('Prueba.edit', function (BreadcrumbTrail $trail, $prueba) {
    $trail->parent('Pruebas', $prueba->libro_id);
    $trail->push('Editar: ' . $prueba->titulo, route('quiz.edit', $prueba->id));
});

// Actividades o Pruebas > Editar: [Prueba] > Actividades
Breadcrumbs::for('Actividades', function (BreadcrumbTrail $trail, $prueba_id) {
    if ($prueba_id != null) {
        $trail->parent('Prueba.edit', Quiz::find($prueba_id));
    }
    $trail->push('Actividades', route('activity.index', $prueba_id));
});

// Actividades > Editar: [Actividad] 
Breadcrumbs::for('Actividades.edit', function (BreadcrumbTrail $trail, $prueba_id, $actividad_id) {
    $trail->parent('Actividades', $prueba_id);
    $trail->push('Ver-Editar', route('activity.show', ['activity_id' => $actividad_id, 'quiz_id' => $prueba_id]));
});
