<?php

namespace Tests\Feature;
use App\Models\Comunidad;
use App\Models\User;
use App\Models\Centro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Image;

class ComunidadTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;

    public function test_visit_index_comunidades(){
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get("/comunidades");

        $response->assertStatus(200);
        $response->assertSee('Comunidades');
    }

    public function test_visiting_create_comunidad(){
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/comunidades/create');
        
        $response->assertStatus(200);
    }

    public function test_creating_comunidad(){
        $user = User::factory()->create();
        $centro = Centro::factory()->create();
        $response = $this->actingAs($user)->post('/comunidades',[
            'nombre' => 'Comunidad de prueba',
            'descripcion' => 'Descripción para la comunidad de prueba',
            'reglas' => 'Reglas para la comunidad',
            'user_id' => $user->id,
            'centro_id' => $centro->id,
            'estado_comunidad' => 'activo',
        ]);

        $response->assertRedirect("/comunidades");

        $this->assertDatabaseHas('comunidades',[
            'nombre' => 'Comunidad de prueba',
            'descripcion' => 'Descripción para la comunidad de prueba',
            'reglas' => 'Reglas para la comunidad',
            'user_id' => $user->id,
            'centro_id' => $centro->id,
            'estado_comunidad' => 'activo',
        ]);
    }   

    public function test_invalid_creating_comunidad(){
        $user = User::factory()->create();
        $centro = Centro::factory()->create();
        $response = $this->actingAs($user)->post('/comunidades',[
            'nombre' => 'Co',
            'descripcion' => 'Descripción para la comunidad de prueba',
            'reglas' => 'Reglas para la comunidad',
            'user_id' => $user->id,
            'centro_id' => $centro->id,
            'estado_comunidad' => 'activo',
        ]);

        $response->assertSessionHasErrors(['nombre']);
    }

    public function test_visiting_edit_comunidad(){
        $user = User::find(1);
        $centro = Centro::factory()->create();
        $comunidad = Comunidad::factory()->create([
            'user_id' => $user->id,
            'centro_id' => $centro->id,
        ]);
        
        $response = $this->actingAs($user)->get("/comunidades/{$comunidad->id}/edit");

        $response->assertStatus(200);
    }

    public function test_edit_comunidad(){
        $user = User::factory()->create();
        $centro = Centro::factory()->create();
        $comunidad = Comunidad::factory()->create([
            'user_id' => $user->id,
            'centro_id' => $centro->id,
        ]);

        $response = $this->actingAs($user)->put("/comunidades/{$comunidad->id}",[
            'nombre' => 'Comunidad de prueba editada',
            'descripcion' => 'Descripción para la comunidad de prueba editada',
            'reglas' => 'Reglas para la comunidad editada',
            'user_id' => $user->id,
            'centro_id' => $centro->id,
            'estado_comunidad' => 'activo',
        ]);
        
        $response->assertRedirect("/comunidades");
        $this->assertDatabaseHas('comunidades',[
            'nombre' => 'Comunidad de prueba editada',
            'descripcion' => 'Descripción para la comunidad de prueba editada',
            'reglas' => 'Reglas para la comunidad editada',
            'user_id' => $user->id,
            'centro_id' => $centro->id,
            'estado_comunidad' => 'activo',
        ]);
    }

    public function test_delete_comunidad(){
        $user = User::factory()->create();
        $centro = Centro::factory()->create();
        $comunidad = Comunidad::factory()->create([
            'user_id' => $user->id,
            'centro_id' => $centro->id,      
        ]);

        $response = $this->actingAs($user)->delete("/comunidades/{$comunidad->id}");

        $response->assertRedirect("/comunidades");

        $this->assertDatabaseMissing('comunidades',[
            'id' => $comunidad->id,
        ]);
    }
}
