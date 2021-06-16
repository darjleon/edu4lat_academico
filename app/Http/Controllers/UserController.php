<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all()->pluck('name');
        $usuarios = User::with('roles')->orderby('id', 'DESC')->paginate(10);
        return view('users.indexUser', compact('usuarios', 'roles'));
    }

    public function show($user_id)
    {
        $actual = Auth::user();
        $user_ver = User::find($user_id);
        $cursos = '';
        $libros = '';
        $editar = false;

        if ($user_ver->hasRole('Estudiante')) {

            $cursos = $user_ver->cursos;
        } elseif ($user_ver->hasRole('Docente')) {
            $libros = DB::table('books')
                ->leftJoin('course__books', 'books.id', '=', 'course__books.libro_id')
                ->select('books.*')
                ->where('course__books.docente_id', '=', $user_id)
                ->distinct()
                ->get();
            $cursos = DB::table('courses')
                ->leftJoin('course__books', 'courses.id', '=', 'course__books.curso_id')
                ->select('courses.*', 'course__books.libro_id')
                ->where('course__books.docente_id', '=', $user_id)
                ->distinct()
                ->get();
        } elseif ($user_ver->hasRole('Coordinador')) {

            $cursos = Course::where('coordinador_id', $user_id)->get();
        } elseif ($user_ver->hasRole('Administrador')) {

            $cursos = Course::all();
        }

        if ($actual->id == $user_id) {
            $editar = true;
        }

        return view('users.verPerfil', compact('user_ver', 'editar'), compact('cursos', 'libros'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        if ($request->rol != null) {
            $user->assignRole($request->rol);
        }
        return redirect()->route('usuario.index');
    }

    public function update(Request $request, $user_id)
    {

        $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255',
        ]);

        $usuario = User::find($user_id);
        $usuario->name = $request->name;

        if ($usuario->email != $request->email) {
            $request->validate([
                'email' => 'unique:users',
            ]);
            $usuario->email = $request->email;
        }

        if ($request->password != null) {
            $request->validate([
                'password' => 'string|confirmed|min:8',
            ]);
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        if ($request->rol != null) {
            $usuario->syncRoles($request->rol);
        }
        return redirect()->route('usuario.index');
    }

    public function destroy($user_id)
    {
        $usuario = User::find($user_id);
        $usuario->delete();
        return redirect()->route('usuario.index');
    }
}
