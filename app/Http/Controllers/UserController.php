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

    public function edit($user_id)
    {
        $user_edit = User::find($user_id);

        return view('users.editPerfil', compact('user_edit'));
    }

    public function updatePF(Request $request, $user_id)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                "foto" => ['image', 'max:2048', 'mimes:jpeg,png,jpg,gif,svg'],

            ],
            [
                'required' => 'El :attribute de la institución es requerido.',
                'image' => 'El :attribute debe ser una imagen.',
                'mimes' => 'El :attribute debe tener ser del tipo: :values.',
                'max' => 'El :attribute debe pesar menos de :max KB.',
            ]
        );

        $user_edit = User::find($user_id);

        if ($user_edit->email != $request->email) {
            $request->validate([
                'email' => 'unique:users',
            ]);
            $user_edit->email = $request->email;
        }

        $user_edit->name = $request->name;

        if ($user_edit->foto != null && $request->hasFile('foto')) {
            unlink('storage/userPerfilFoto/' . $user_edit->foto);
            $user_edit->foto = null;
        }

        if ($request->hasFile('foto')) {
            $imagen =  str_replace(" ", "_", $request->name) . '.' . time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $user_edit->foto = $imagen;
            $request->foto->storeAs('public/userPerfilFoto', $imagen);
        }

        $user_edit->save();
        return redirect()->route('usuario.show',  $user_id);
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
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
