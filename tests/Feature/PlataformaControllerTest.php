<?php

namespace Tests\Feature;
use App\Models\Plataforma;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;




class PlataformaControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */

     
    public function test_index_route(): void
{
    $response = $this->get('/plataforma'); 

    $response->assertStatus(200); 
    $response->assertSee('Listado de Plataformas');

}
public function test_store_method(): void
{
    $data = [
        'nombre_plataforma' => 'Nombre de la plataforma',
        'tipo_plataforma' => 'Tipo de la plataforma',
    ];

    $response = $this->post('/plataforma', $data);

    $response->assertStatus(302); 
    $this->assertDatabaseHas('plataformas', $data); 
}
public function test_store_validation_errors(): void
{
    $data = []; // Datos faltantes o incorrectos

    $response = $this->post('/plataforma', $data);

    $response->assertStatus(302); 
    $response->assertSessionHasErrors(['nombre_plataforma', 'tipo_plataforma']); 
}

public function test_destroy_method(): void
    {
        $plataforma = Plataforma::factory()->create(); // Crear un registro de plataforma

        $response = $this->delete("/plataforma/{$plataforma->id}");

        $response->assertStatus(302); // Asegurar redireccionamiento (código de estado 302)

        // Verificar que el registro se haya eliminado de la base de datos
        $this->assertDatabaseMissing('plataformas', ['id' => $plataforma->id]);
    }

 
}