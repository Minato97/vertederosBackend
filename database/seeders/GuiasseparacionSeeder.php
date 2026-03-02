<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuiasseparacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'titulo' => 'Guia 1',
                'descripcion' => 'Desc 1',
                'manual_PDF' => 'manual 1'
            ],
            [
                'titulo' => 'Guia 2',
                'descripcion' => 'Desc 2',
                'manual_PDF' => 'manual 2'
            ],
            [
                'titulo' => 'Guia 3',
                'descripcion' => 'Desc 3',
                'manual_PDF' => 'manual 3'
            ]
        ];
        DB::table('guiasSeparacion')->insert($data);
    }
}
