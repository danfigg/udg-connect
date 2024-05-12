<?php

namespace Tests\Feature;
use App\Models\Evento;
use App\Models\User;
use App\Models\Comunidad;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventoTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;
    public function test_visiting_index_eventos(): void
    {   
        $user = User::factory()->create();
        $comunidad=Comunidad::factory()->create(['user_id' => $user->id,'nombre'=>'Comunidad de prueba']);
        $response = $this->actingAs($user)->get("/comunidades/{$comunidad->id}");

        $response->assertStatus(200);
        $response->assertSee('Comunidad de prueba');
    }

    public function test_visiting_create_evento(){
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/eventos/create');
        
        $response->assertStatus(200);
    }

    public function test_creating_evento(){
        $user = User::factory()->create();
        $comunidad = Comunidad::factory()->create(['user_id' => $user->id]);
        $response = $this->actingAs($user)->post('/eventos',[
            'nombre' => 'Evento de prueba',
            'descripcion' => 'Descripción de prueba',
            'user_id' => $user->id,
            'comunidad_id' => $comunidad->id,
            'estado_moderacion' => 'aprobado',
            'fecha_hora_evento' => '2024-03-05 03:18:27',
            'duracion_horas' => 1,
        ]);

        $response->assertRedirect("/comunidades/{$comunidad->id}");
        $this->assertDatabaseHas('eventos',[
            'nombre' => 'Evento de prueba',
            'descripcion' => 'Descripción de prueba',
            'user_id' => $user->id,
            'comunidad_id' => $comunidad->id,
            'estado_moderacion' => 'aprobado',
            'fecha_hora_evento' => '2024-03-05 03:18:27',
            'duracion_horas' => 1,
        ]);
    }   

    public function test_invalid_creating_evento(){
        $user = User::factory()->create();
        $comunidad = Comunidad::factory()->create(['user_id' => $user->id]);
        $response = $this->actingAs($user)->post('/posts',[
            'titulo' => 'Ti',
            'contenido' => 'El titulo debe ser al menos 5 caracteres',
            'tags' => '#tag1#tag2',
            'comunidad_id' => $comunidad->id,
            'semestre'=>'all',
        ]);

        $response->assertSessionHasErrors(['titulo']);
    }

    public function test_visiting_edit_evento(){
        $user = User::find(1);
        $comunidad = Comunidad::factory()->create(['user_id' => $user->id]);
        $evento = Evento::factory()->create(['user_id' => $user->id, 'comunidad_id' => $comunidad->id]);
        $response = $this->actingAs($user)->get("/eventos/{$evento->id}/edit");

        $response->assertStatus(200);
    }

    public function test_edit_evento(){
        $user = User::factory()->create();
        $comunidad = Comunidad::factory()->create(['user_id' => $user->id]);
        $evento = Evento::factory()->create(['user_id' => $user->id, 'comunidad_id' => $comunidad->id]);
        $response = $this->actingAs($user)->put("/eventos/{$evento->id}",[
            'nombre' => 'Evento de prueba editado',
            'descripcion' => 'Descripción de prueba editada',
            'user_id' => $user->id,
            'comunidad_id' => $comunidad->id,
            'estado_moderacion' => 'aprobado',
            'fecha_hora_evento' => '2024-03-05 03:18:27',
            'duracion_horas' => 1,
        ]);
        
        $response->assertRedirect("/eventos");
        $this->assertDatabaseHas('eventos',[
            'nombre' => 'Evento de prueba editado',
            'descripcion' => 'Descripción de prueba editada',
            'user_id' => $user->id,
            'comunidad_id' => $comunidad->id,
            'estado_moderacion' => 'aprobado',
            'fecha_hora_evento' => '2024-03-05 03:18:27',
            'duracion_horas' => 1,
        ]);
    }

    public function test_delete_evento(){
        $user = User::factory()->create();
        $comunidad = Comunidad::factory()->create(['user_id' => $user->id]);
        $evento = Evento::factory()->create(['user_id' => $user->id, 'comunidad_id' => $comunidad->id]);
        $response = $this->actingAs($user)->delete("/eventos/{$evento->id}");

        $response->assertRedirect("/eventos");
        $this->assertDatabaseMissing('eventos',[
            'id' => $evento->id,
        ]);
    }
}
