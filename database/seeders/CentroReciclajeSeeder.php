<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CentroReciclajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nombre'=>'La reyna',
                'ubicacion'=>'lo que sea',
            ],
            [
                'nombre'=>'Colonia Centro',
                'ubicacion'=>'lo que sea x2',
            ],
            [
                'nombre'=>'Colonia Obrera',
                'ubicacion'=>'lo que sea x3',
            ]
        ];
        DB::table('centrosReciclaje')->insert($data);
    }
}
