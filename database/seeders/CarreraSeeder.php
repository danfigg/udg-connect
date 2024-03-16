<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      require base_path('/database/seeders/CentroAndCarreraInfo.php');
      foreach($carreras as $carrera){
          Carrera::create([
              'nombre'=> $carrera['Carrera'], 
          ]);
      }
    }
}
