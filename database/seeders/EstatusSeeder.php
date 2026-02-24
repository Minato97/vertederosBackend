<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'estado'=>'Activo'
            ],
            [
                'estado'=>'Inactivo'
            ]
        ];
        DB::table('estatus')->insert($data);
    }
}
