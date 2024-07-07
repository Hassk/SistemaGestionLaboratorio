<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Reporte;

class ReporteTest extends TestCase
{

    /** @test */
    public function create_a_report()
    {
        $response = $this->post('/reporte', [
            'descripcion' => 'Reporte de incidente',
            'nombre_estudiante' => 'Juan Pérez',
            'codigo_universitario' => '123456',
            'facultad' => 'Ingeniería',
            'fecha' => '2024-07-01',
            'docente_a_cargo' => 'Dr. Gómez'
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('reportes', [
            'descripcion' => 'Reporte de incidente',
            'nombre_estudiante' => 'Juan Pérez',
            'codigo_universitario' => '123456',
            'facultad' => 'Ingeniería',
            'fecha' => '2024-07-01',
            'docente_a_cargo' => 'Dr. Gómez'
        ]);
    }

}
