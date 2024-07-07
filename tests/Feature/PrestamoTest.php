<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PrestamoTest extends TestCase
{

    /** @test */
    public function crear_prestamo()
    {
        $response = $this->post('/prestamo', [
            'producto_id' => 1,
            'nombre_estudiante' => 'Juan Pérez',
            'codigo_universitario' => '123456',
            'facultad' => 'Ingeniería',
            'docente_a_cargo' => 'Dr. Gómez',
            'descripcion' => 'Préstamo para proyecto',
            'fecha_prestamo' => '2024-07-01',
            'fecha_devolucion' => '2024-07-10'
        ]);

        $response->assertStatus(302);
    }
}
