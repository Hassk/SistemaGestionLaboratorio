<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Categorias;
use App\Models\Producto;

class ProductoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_add_a_product()
    {
        $categoria = Categorias::factory()->create();

        $response = $this->post('/inventario', [
            'nombre' => 'Laptop',
            'descripcion' => 'Laptop de alta gama',
            'categoria_id' => $categoria->id,
            'cantidad' => 10,
            'estado' => 'disponible'
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function a_user_can_update_a_product()
    {
        $categoria = Categorias::factory()->create();
        $producto = Producto::factory()->create([
            'nombre' => 'Tablet',
            'descripcion' => 'Tablet de última generación',
            'categoria_id' => $categoria->id,
            'cantidad' => 5,
            'estado' => 'disponible'
        ]);

        $response = $this->put('/inventario/' . $producto->id, [
            'nombre' => 'Tablet Actualizada',
            'descripcion' => 'Tablet con mejoras de rendimiento',
            'categoria_id' => $categoria->id,
            'cantidad' => 8,
            'estado' => 'disponible'
        ]);

        $response->assertStatus(302);
    }

    /** @test */
    public function a_user_can_delete_a_product()
    {
        $producto = Producto::factory()->create();

        $response = $this->delete('/inventario/' . $producto->id);

        $response->assertStatus(302);
    }
}
