<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Usuarios;

class UsuariosTest extends TestCase
{
    public function test_user_can_register()
    {
        // Registrar un usuario
        $usuario = Usuarios::create([
            'nombre' => 'John',
            'apellido' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password')
        ]);

        // Verificar que el usuario se ha registrado
        $this->assertDatabaseHas('usuarios', [
            'nombre' => 'John',
            'apellido' => 'Doe',
            'email' => 'john.doe@example.com'
        ]);
    }
}
