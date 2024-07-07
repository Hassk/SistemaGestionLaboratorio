<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Solicitud;
use App\Models\Usuarios;

class SolicitudTest extends TestCase
{
    public function test_user_can_create_solicitud()
    {
        // Crear un usuario primero
        $usuario = Usuarios::create([
            'nombre' => 'John',
            'apellido' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password')
        ]);

        // Crear una solicitud
        $solicitud = Solicitud::create([
            'usuario_id' => $usuario->id,
            'tipo_solicitud' => 'Mantenimiento',
            'estado' => 'pendiente',
            'descripcion' => 'Solicitud de mantenimiento',
            'fecha_solicitud' => now()
        ]);

        // Verificar que la solicitud se ha creado
        $this->assertDatabaseHas('solicitudes', [
            'usuario_id' => $usuario->id,
            'tipo_solicitud' => 'Mantenimiento',
            'estado' => 'pendiente',
            'descripcion' => 'Solicitud de mantenimiento'
        ]);
    }
}
