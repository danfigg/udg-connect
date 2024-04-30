<?php

namespace Tests\Feature;

use App\Models\Comunidad;
use App\Models\Post;
use App\Models\User;
use Database\Seeders\CarreraSeeder;
use Database\Seeders\CentroCarreraSeeder;
use Database\Seeders\CentroSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    
    use RefreshDatabase;
    protected $seed = true;
    public function test_visiting_index_posts(): void
    {   
        $user = User::factory()->create();
        $comunidad=Comunidad::factory()->create(['user_id' => $user->id,'nombre'=>'Comunidad de prueba']);
        $response = $this->actingAs($user)->get("/comunidades/{$comunidad->id}");

        $response->assertStatus(200);
        $response->assertSee('Comunidad de prueba');
    }

    public function test_visiting_create_post(){
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/posts/create');
        
        $response->assertStatus(200);
    }

    public function test_creating_post(){
        $user = User::factory()->create();
        $comunidad = Comunidad::factory()->create(['user_id' => $user->id]);
        $response = $this->actingAs($user)->post('/posts',[
            'titulo' => 'Titulo de prueba',
            'contenido' => 'Contenido de prueba',
            'tags' => '#tag1#tag2',
            'comunidad_id' => $comunidad->id,
            'semestre'=>'all',
        ]);

        $response->assertRedirect("/comunidades/{$comunidad->id}");
        $this->assertDatabaseHas('posts',[
            'titulo' => 'Titulo de prueba',
            'contenido' => 'Contenido de prueba',
            'user_id' => $user->id,
            'comunidad_id' => $comunidad->id,
        ]);
    }   

    public function test_invalid_creating_post(){
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

    public function test_visiting_edit_post(){
        $user = User::find(1);
        $comunidad = Comunidad::factory()->create(['user_id' => $user->id]);
        $post = Post::factory()->create(['user_id' => $user->id, 'comunidad_id' => $comunidad->id]);
        $response = $this->actingAs($user)->get("/posts/{$post->id}/edit");

        $response->assertStatus(200);
    }

    public function test_edit_post(){
        $user = User::factory()->create();
        $comunidad = Comunidad::factory()->create(['user_id' => $user->id]);
        $post = Post::factory()->create(['user_id' => $user->id, 'comunidad_id' => $comunidad->id]);
        $response = $this->actingAs($user)->put("/posts/{$post->id}",[
            'titulo' => 'Titulo de prueba editado',
            'contenido' => 'Contenido de prueba editado',
            'tags' => '#tag1#tag2',
            'comunidad_id' => $comunidad->id,
            'semestre'=>'all',
        ]);
        
        $response->assertRedirect("/comunidades/{$comunidad->id}");
        $this->assertDatabaseHas('posts',[
            'titulo' => 'Titulo de prueba editado',
            'contenido' => 'Contenido de prueba editado',
            'user_id' => $user->id,
            'comunidad_id' => $comunidad->id,
        ]);
    }

    public function test_delete_post(){
        $user = User::factory()->create();
        $comunidad = Comunidad::factory()->create(['user_id' => $user->id]);
        $post = Post::factory()->create(['user_id' => $user->id, 'comunidad_id' => $comunidad->id]);
        $response = $this->actingAs($user)->delete("/posts/{$post->id}");

        $response->assertRedirect("/comunidades/{$comunidad->id}");
        $this->assertDatabaseMissing('posts',[
            'id' => $post->id,
        ]);
    }
}
