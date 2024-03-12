<?php

namespace Database\Seeders;

use App\Models\Centro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CentroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $centros = ['CUCEI','CUCEA','CUAAD','CUCBA','CUCS','CUCSH','CUALTOS','CUCIÉNEGA','CUCOSTA','CUCSUR','CULAGOS','CUNORTE','CUSUR','CUTONALÁ','CUVALLES'];
        foreach($centros as $nombre_centro) {
            Centro::create(
                [
                    'nombre'=>$nombre_centro,
                ]
            );
        }
    }
}
