<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Categorias;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoriaTest extends TestCase
{

    /** @test */
    public function a_user_can_create_a_category()
    {
        $response = $this->post('/categorias', [
            'nombre' => 'Electrónica',
            'descripcion' => 'Dispositivos electrónicos'
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('Categorias', [
            'nombre' => 'Electrónica',
            'descripcion' => 'Dispositivos electrónicos'
        ]);
    }

    /** @test */
    public function category_name_is_required()
    {
        $response = $this->post('/categorias', [
            'descripcion' => 'Dispositivos electrónicos'
        ]);

        $response->assertSessionHasErrors('nombre');
    }
}
