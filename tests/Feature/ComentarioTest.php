<?php

namespace Tests\Feature;

use App\Models\Comunidad;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ComentarioTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;

    public function test_visit_index_and_create(){
        $user = User::factory()->create();
        $comunidad=Comunidad::factory()->create(['user_id' => $user->id,'nombre'=>'Comunidad de prueba']);
        $post = Post::factory()->create(['user_id' => $user->id,'comunidad_id' => $comunidad->id]);

        $response = $this->actingAs($user)->get("/posts/{$post->id}/comentarios");

        $response->assertStatus(200);
        $response->assertSee('Comentarios');
    }

    public function test_create_comment(){
        $user = User::factory()->create();
        $comunidad=Comunidad::factory()->create(['user_id' => $user->id,'nombre'=>'Comunidad de prueba']);
        $post = Post::factory()->create(['user_id' => $user->id,'comunidad_id' => $comunidad->id]);

        $response = $this->actingAs($user)->post("/post/{$post->id}/comentarios",[
            'cuerpo' => 'Comentario de prueba',
        ]);
        
        $response->assertRedirect("/posts/{$post->id}/comentarios");
        $this->assertDatabaseHas('comentarios',[
            'cuerpo' => 'Comentario de prueba',
        ]);
    }

    public function test_invalid_create_comment(){
        $user = User::factory()->create();
        $comunidad=Comunidad::factory()->create(['user_id' => $user->id,'nombre'=>'Comunidad de prueba']);
        $post = Post::factory()->create(['user_id' => $user->id,'comunidad_id' => $comunidad->id]);

        $response = $this->actingAs($user)->post("/post/{$post->id}/comentarios",[
            'cuerpo' => 'c',
        ]);

        $response->assertSessionHasErrors(['cuerpo']);
    }

    public function test_visit_edit_comment(){
        $user = User::factory()->create();
        $comunidad=Comunidad::factory()->create(['user_id' => $user->id,'nombre'=>'Comunidad de prueba']);
        $post = Post::factory()->create(['user_id' => $user->id,'comunidad_id' => $comunidad->id]);
        $comentario = $post->comentarios()->create(['cuerpo' => 'Comentario de prueba','user_id' => $user->id]);

        $response = $this->actingAs($user)->get("/comentarios/{$comentario->id}/edit");
        $response->assertStatus(200);
    }

    public function test_edit_comment(){
        $user = User::factory()->create();
        $comunidad=Comunidad::factory()->create(['user_id' => $user->id,'nombre'=>'Comunidad de prueba']);
        $post = Post::factory()->create(['user_id' => $user->id,'comunidad_id' => $comunidad->id]);
        $comentario = $post->comentarios()->create(['cuerpo' => 'Comentario de prueba','user_id' => $user->id]);

        $response = $this->actingAs($user)->put("/comentarios/{$comentario->id}",[
            'cuerpo' => 'Comentario editado',
        ]);

        $response->assertRedirect("/posts/{$post->id}/comentarios");
        $this->assertDatabaseHas('comentarios',[
            'cuerpo' => 'Comentario editado',
        ]);
    }

    
    public function test_force_delete_comment(){
        $user = User::factory()->create();
        $comunidad=Comunidad::factory()->create(['user_id' => $user->id,'nombre'=>'Comunidad de prueba']);
        $post = Post::factory()->create(['user_id' => $user->id,'comunidad_id' => $comunidad->id]);
        $comentario = $post->comentarios()->create(['cuerpo' => 'Comentario de prueba','user_id' => $user->id]);

        $response = $this->actingAs($user)->delete("/comentarios/{$comentario->id}/force_delete");

        $response->assertRedirect("/posts/{$post->id}/comentarios");
        $this->assertDatabaseMissing('comentarios',[
            'cuerpo' => 'Comentario de prueba',
        ]);
    }
}
