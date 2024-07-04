<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = Usuarios::all();
        return view('usuario.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('usuario.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required'
        ]);

        $usuario = Usuarios::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $usuario->assignRole($request->roles);

        return redirect()->route('usuario.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit($id)
    {
        $user = Usuarios::findOrFail($id);
        $roles = Role::all();
        return view('usuario.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios,email,' . $id,
            'roles' => 'required'
        ]);

        $user = Usuarios::findOrFail($id);
        $user->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
        ]);

        $user->syncRoles($request->roles);

        return redirect()->route('usuario.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $user = Usuarios::findOrFail($id);
        $user->delete();

        return redirect()->route('usuario.index')->with('success', 'Usuario eliminado exitosamente.');
    }

    public function showAssignRoleForm($userId)
    {
        $user = Usuarios::findOrFail($userId);
        $roles = Role::all();
        return view('usuario.assign-role', compact('user', 'roles'));
    }

    public function assignRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $user = Usuarios::findOrFail($userId);
        $user->assignRole($request->input('role'));

        return redirect()->back()->with('success', 'Rol asignado exitosamente.');
    }
}
