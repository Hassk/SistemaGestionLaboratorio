<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Producto;
use App\Models\Usuarios;
use App\Models\Mantenimiento;
use Illuminate\Foundation\Testing\WithFaker;

class MantenimientoTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function a_user_can_create_a_maintenance()
    {
        $producto = Producto::factory()->make([
            'nombre' => 'Laptop',
            'descripcion' => 'Laptop de alta gama',
            'categoria_id' => 1,
            'cantidad' => 10,
            'estado' => 'disponible'
        ]);

        $usuario = Usuarios::factory()->make();

        $response = $this->post('/mantenimientos', [
            'producto_id' => $producto->id,
            'usuario_id' => $usuario->id,
            'descripcion' => 'Reparación de teclado',
            'tipo' => 'Reparación',
            'fecha_inicio' => '2024-07-01',
            'fecha_fin' => '2024-07-05'
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function maintenance_description_is_required()
    {
        $response = $this->post('/mantenimientos', [
            'producto_id' => 1,
            'usuario_id' => 1,
            'tipo' => 'Reparación',
            'fecha_inicio' => '2024-07-01',
            'fecha_fin' => '2024-07-05'
        ]);

        $response->assertSessionHasErrors(302);
    }
}
