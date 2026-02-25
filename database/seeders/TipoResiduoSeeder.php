<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoResiduoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'residuo'=>'Orgánico'
            ],
            [
                'residuo' =>'Inorgánico'
            ],
            [
                'residuo' =>'Electrónico'
            ],
            [
                'residuo' =>'Peligroso'
            ]
        ];
        DB::table('tipoResiduo')->insert($data);
    }
}
