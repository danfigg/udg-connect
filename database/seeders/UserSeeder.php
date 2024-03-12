<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     User::create([
        'name'=>'Admin',
        'email'=>'admin@gmail.com',
        'password'=>password_hash('1234',PASSWORD_BCRYPT),
     ]);

    //  DB::table('users')->insert([
    //     'name'=>'Admin',
    //     'email'=>'admin@gmail.com',
    //     'password'=>'123456789',
    //  ]);
    }
}
