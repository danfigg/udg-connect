<?php

namespace Database\Seeders;

use App\Models\CentroCarrera;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CentroCarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      require base_path('/database/seeders/CentroAndCarreraInfo.php');
      for($i=0;$i<count($carreras);$i+=1){
          $facultades = explode(", ",$carreras[$i]["Facultad(es)"]);
          foreach($facultades as $facultad){
              $facultad_id = array_search($facultad,$centros)+1;
              CentroCarrera::create(
                [
                  'carrera_id'=>$i+1,
                  'centro_id'=>$facultad_id,
                ]
                );
          }
      }
    }
}
