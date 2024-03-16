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
        require base_path('/database/seeders/CentroAndCarreraInfo.php');
        foreach($centros as $nombre_centro) {
            Centro::create(
                [
                    'nombre'=>$nombre_centro,
                ]
            );
        }
    }
}
