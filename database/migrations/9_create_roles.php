<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;
use App\Models\Usuarios;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Crear roles
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);

        // Asignar rol a un usuario específico (por ejemplo, el primer usuario)
        $user = Usuarios::find(1);
        if ($user) {
            $user->assignRole($role1);
        }
        $user = Usuarios::find(2);
        if ($user) {
            $user->assignRole($role1);
        }

        $user = Usuarios::find(3);
        if ($user) {
            $user->assignRole($role2);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar roles
        Role::where('name', 'admin')->delete();
        Role::where('name', 'user')->delete();
    }
};
