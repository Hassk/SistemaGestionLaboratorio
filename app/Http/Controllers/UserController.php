<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function showAssignRoleForm($userId)
    {
        $user = Usuarios::findOrFail($userId);
        $roles = Role::all();
        return view('users.assign-role', compact('user', 'roles'));
    }

    public function assignRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $user = Usuarios::findOrFail($userId);
        $user->assignRole($request->input('role'));

        return redirect()->back()->with('success', 'Role assigned successfully.');
    }
}
