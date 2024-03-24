<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comunidad;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UserSeeder::class, 
                    CentroSeeder::class, 
                    CarreraSeeder::class,
                    CentroCarreraSeeder::class
        ]);

         User::factory(10)
         ->has(Comunidad::factory()->count(3))
         ->create();

         Comunidad::all()
         ->each(function($comunidad){
             $comunidad->posts()->saveMany(Post::factory(10)->make());
         });
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
