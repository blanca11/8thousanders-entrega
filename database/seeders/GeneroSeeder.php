<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generos = [
            ['id_genero' => 1, 'nombre_genero' => 'Rock'],
            ['id_genero' => 2, 'nombre_genero' => 'Hip-Hop / Rap'],
            ['id_genero' => 3, 'nombre_genero' => 'Electronic / EDM'],
            ['id_genero' => 4, 'nombre_genero' => 'Pop'],
            ['id_genero' => 5, 'nombre_genero' => 'Jazz'],
            ['id_genero' => 6, 'nombre_genero' => 'Classical'],
            ['id_genero' => 7, 'nombre_genero' => 'Country'],
            ['id_genero' => 8, 'nombre_genero' => 'Blues'],
            ['id_genero' => 9, 'nombre_genero' => 'R&B / Soul'],
            ['id_genero' => 10, 'nombre_genero' => 'Folk'],
            ['id_genero' => 11, 'nombre_genero' => 'World Music'],
            ['id_genero' => 12, 'nombre_genero' => 'Metal'],
            ['id_genero' => 13, 'nombre_genero' => 'Funk & Disco'],
            ['id_genero' => 14, 'nombre_genero' => 'Reggae / Caribbean'],
            ['id_genero' => 15, 'nombre_genero' => 'Latin'],
            ['id_genero' => 16, 'nombre_genero' => 'Alternative'],
            ['id_genero' => 17, 'nombre_genero' => 'Experimental'],
        ];

        // 1) Deshabilitar temporalmente las FK
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 2) Truncar la tabla (ahora no se quejará por subgenero)
        DB::table('genero')->truncate();

        // 3) Reactivar las FK
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 4) Insertar géneros
        DB::table('genero')->insert($generos);
    }
}
