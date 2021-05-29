<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
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
        $usuarios = User::with('roles')->orderby('id', 'DESC')->get();
        /* DB::table('users')
            ->orderBy('id', 'desc')->paginate(15); */
        return view('users.indexUser', compact('usuarios', 'roles'));
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
