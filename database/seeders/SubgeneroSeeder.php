<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubgeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subgeneros = [
            ['id_subgenero' => 1, 'id_genero' => 1, 'nombre_subgenero' => 'Classic Rock'],
            ['id_subgenero' => 2, 'id_genero' => 1, 'nombre_subgenero' => 'Hard Rock'],
            ['id_subgenero' => 3, 'id_genero' => 1, 'nombre_subgenero' => 'Punk Rock'],
            ['id_subgenero' => 4, 'id_genero' => 1, 'nombre_subgenero' => 'Alternative Rock'],
            ['id_subgenero' => 5, 'id_genero' => 1, 'nombre_subgenero' => 'Indie Rock'],
            ['id_subgenero' => 6, 'id_genero' => 1, 'nombre_subgenero' => 'Prog Rock'],
            ['id_subgenero' => 7, 'id_genero' => 1, 'nombre_subgenero' => 'Psychedelic Rock'],
            ['id_subgenero' => 8, 'id_genero' => 1, 'nombre_subgenero' => 'Garage Rock'],
            ['id_subgenero' => 9, 'id_genero' => 2, 'nombre_subgenero' => 'East Coast'],
            ['id_subgenero' => 10, 'id_genero' => 2, 'nombre_subgenero' => 'West Coast'],
            ['id_subgenero' => 11, 'id_genero' => 2, 'nombre_subgenero' => 'Southern'],
            ['id_subgenero' => 12, 'id_genero' => 2, 'nombre_subgenero' => 'Trap'],
            ['id_subgenero' => 13, 'id_genero' => 2, 'nombre_subgenero' => 'Boom Bap'],
            ['id_subgenero' => 14, 'id_genero' => 2, 'nombre_subgenero' => 'Drill'],
            ['id_subgenero' => 15, 'id_genero' => 2, 'nombre_subgenero' => 'Conscious Rap'],
            ['id_subgenero' => 16, 'id_genero' => 2, 'nombre_subgenero' => 'Alternative Hip-Hop'],
            ['id_subgenero' => 17, 'id_genero' => 3, 'nombre_subgenero' => 'House'],
            ['id_subgenero' => 18, 'id_genero' => 3, 'nombre_subgenero' => 'Techno'],
            ['id_subgenero' => 19, 'id_genero' => 3, 'nombre_subgenero' => 'Trance'],
            ['id_subgenero' => 20, 'id_genero' => 3, 'nombre_subgenero' => 'Dubstep'],
            ['id_subgenero' => 21, 'id_genero' => 3, 'nombre_subgenero' => 'Drum & Bass'],
            ['id_subgenero' => 22, 'id_genero' => 3, 'nombre_subgenero' => 'Ambient'],
            ['id_subgenero' => 23, 'id_genero' => 3, 'nombre_subgenero' => 'Electro'],
            ['id_subgenero' => 24, 'id_genero' => 3, 'nombre_subgenero' => 'Synthwave'],
            ['id_subgenero' => 25, 'id_genero' => 4, 'nombre_subgenero' => 'Dance Pop'],
            ['id_subgenero' => 26, 'id_genero' => 4, 'nombre_subgenero' => 'Synthpop'],
            ['id_subgenero' => 27, 'id_genero' => 4, 'nombre_subgenero' => 'Electropop'],
            ['id_subgenero' => 28, 'id_genero' => 4, 'nombre_subgenero' => 'Teen Pop'],
            ['id_subgenero' => 29, 'id_genero' => 4, 'nombre_subgenero' => 'Indie Pop'],
            ['id_subgenero' => 30, 'id_genero' => 4, 'nombre_subgenero' => 'Art Pop'],
            ['id_subgenero' => 31, 'id_genero' => 5, 'nombre_subgenero' => 'Bebop'],
            ['id_subgenero' => 32, 'id_genero' => 5, 'nombre_subgenero' => 'Cool Jazz'],
            ['id_subgenero' => 33, 'id_genero' => 5, 'nombre_subgenero' => 'Free Jazz'],
            ['id_subgenero' => 34, 'id_genero' => 5, 'nombre_subgenero' => 'Fusion'],
            ['id_subgenero' => 35, 'id_genero' => 5, 'nombre_subgenero' => 'Smooth Jazz'],
            ['id_subgenero' => 36, 'id_genero' => 5, 'nombre_subgenero' => 'Swing'],
            ['id_subgenero' => 37, 'id_genero' => 5, 'nombre_subgenero' => 'Latin Jazz'],
            ['id_subgenero' => 38, 'id_genero' => 6, 'nombre_subgenero' => 'Baroque'],
            ['id_subgenero' => 39, 'id_genero' => 6, 'nombre_subgenero' => 'Classical Period'],
            ['id_subgenero' => 40, 'id_genero' => 6, 'nombre_subgenero' => 'Romantic'],
            ['id_subgenero' => 41, 'id_genero' => 6, 'nombre_subgenero' => 'Modern'],
            ['id_subgenero' => 42, 'id_genero' => 6, 'nombre_subgenero' => 'Minimalism'],
            ['id_subgenero' => 43, 'id_genero' => 6, 'nombre_subgenero' => 'Impressionism'],
            ['id_subgenero' => 44, 'id_genero' => 7, 'nombre_subgenero' => 'Classic Country'],
            ['id_subgenero' => 45, 'id_genero' => 7, 'nombre_subgenero' => 'Country Pop'],
            ['id_subgenero' => 46, 'id_genero' => 7, 'nombre_subgenero' => 'Outlaw Country'],
            ['id_subgenero' => 47, 'id_genero' => 7, 'nombre_subgenero' => 'Bluegrass'],
            ['id_subgenero' => 48, 'id_genero' => 7, 'nombre_subgenero' => 'Alt-Country'],
            ['id_subgenero' => 49, 'id_genero' => 7, 'nombre_subgenero' => 'Honky Tonk'],
            ['id_subgenero' => 50, 'id_genero' => 8, 'nombre_subgenero' => 'Delta Blues'],
            ['id_subgenero' => 51, 'id_genero' => 8, 'nombre_subgenero' => 'Chicago Blues'],
            ['id_subgenero' => 52, 'id_genero' => 8, 'nombre_subgenero' => 'Electric Blues'],
            ['id_subgenero' => 53, 'id_genero' => 8, 'nombre_subgenero' => 'Country Blues'],
            ['id_subgenero' => 54, 'id_genero' => 8, 'nombre_subgenero' => 'Blues Rock'],
            ['id_subgenero' => 55, 'id_genero' => 9, 'nombre_subgenero' => 'Motown'],
            ['id_subgenero' => 56, 'id_genero' => 9, 'nombre_subgenero' => 'Neo-Soul'],
            ['id_subgenero' => 57, 'id_genero' => 9, 'nombre_subgenero' => 'Funk'],
            ['id_subgenero' => 58, 'id_genero' => 9, 'nombre_subgenero' => 'Contemporary R&B'],
            ['id_subgenero' => 59, 'id_genero' => 9, 'nombre_subgenero' => 'Quiet Storm'],
            ['id_subgenero' => 60, 'id_genero' => 10, 'nombre_subgenero' => 'Traditional Folk'],
            ['id_subgenero' => 61, 'id_genero' => 10, 'nombre_subgenero' => 'Contemporary Folk'],
            ['id_subgenero' => 62, 'id_genero' => 10, 'nombre_subgenero' => 'Indie Folk'],
            ['id_subgenero' => 63, 'id_genero' => 10, 'nombre_subgenero' => 'Folk Rock'],
            ['id_subgenero' => 64, 'id_genero' => 11, 'nombre_subgenero' => 'Afrobeat'],
            ['id_subgenero' => 65, 'id_genero' => 11, 'nombre_subgenero' => 'Reggae'],
            ['id_subgenero' => 66, 'id_genero' => 11, 'nombre_subgenero' => 'Salsa'],
            ['id_subgenero' => 67, 'id_genero' => 11, 'nombre_subgenero' => 'Cumbia'],
            ['id_subgenero' => 68, 'id_genero' => 11, 'nombre_subgenero' => 'K-Pop'],
            ['id_subgenero' => 69, 'id_genero' => 11, 'nombre_subgenero' => 'J-Pop'],
            ['id_subgenero' => 70, 'id_genero' => 11, 'nombre_subgenero' => 'Latin Pop'],
            ['id_subgenero' => 71, 'id_genero' => 11, 'nombre_subgenero' => 'Bhangra'],
            ['id_subgenero' => 72, 'id_genero' => 12, 'nombre_subgenero' => 'Heavy Metal'],
            ['id_subgenero' => 73, 'id_genero' => 12, 'nombre_subgenero' => 'Thrash'],
            ['id_subgenero' => 74, 'id_genero' => 12, 'nombre_subgenero' => 'Death Metal'],
            ['id_subgenero' => 75, 'id_genero' => 12, 'nombre_subgenero' => 'Black Metal'],
            ['id_subgenero' => 76, 'id_genero' => 12, 'nombre_subgenero' => 'Doom'],
            ['id_subgenero' => 77, 'id_genero' => 12, 'nombre_subgenero' => 'Metalcore'],
            ['id_subgenero' => 78, 'id_genero' => 12, 'nombre_subgenero' => 'Power Metal'],
            ['id_subgenero' => 79, 'id_genero' => 13, 'nombre_subgenero' => 'Funk'],
            ['id_subgenero' => 80, 'id_genero' => 13, 'nombre_subgenero' => 'Disco'],
            ['id_subgenero' => 81, 'id_genero' => 13, 'nombre_subgenero' => 'Nu-Disco'],
            ['id_subgenero' => 82, 'id_genero' => 13, 'nombre_subgenero' => 'Boogie'],
            ['id_subgenero' => 83, 'id_genero' => 14, 'nombre_subgenero' => 'Roots Reggae'],
            ['id_subgenero' => 84, 'id_genero' => 14, 'nombre_subgenero' => 'Dancehall'],
            ['id_subgenero' => 85, 'id_genero' => 14, 'nombre_subgenero' => 'Dub'],
            ['id_subgenero' => 86, 'id_genero' => 14, 'nombre_subgenero' => 'Ska'],
            ['id_subgenero' => 87, 'id_genero' => 15, 'nombre_subgenero' => 'Latin Pop'],
            ['id_subgenero' => 88, 'id_genero' => 15, 'nombre_subgenero' => 'Reggaeton'],
            ['id_subgenero' => 89, 'id_genero' => 15, 'nombre_subgenero' => 'Bachata'],
            ['id_subgenero' => 90, 'id_genero' => 15, 'nombre_subgenero' => 'Merengue'],
            ['id_subgenero' => 91, 'id_genero' => 15, 'nombre_subgenero' => 'Latin Trap'],
            ['id_subgenero' => 92, 'id_genero' => 16, 'nombre_subgenero' => 'Alternative Rock'],
            ['id_subgenero' => 93, 'id_genero' => 16, 'nombre_subgenero' => 'Indie Pop'],
            ['id_subgenero' => 94, 'id_genero' => 16, 'nombre_subgenero' => 'Indie Rock'],
            ['id_subgenero' => 95, 'id_genero' => 16, 'nombre_subgenero' => 'Shoegaze'],
            ['id_subgenero' => 96, 'id_genero' => 16, 'nombre_subgenero' => 'Post-Rock'],
            ['id_subgenero' => 97, 'id_genero' => 17, 'nombre_subgenero' => 'Avant-Garde'],
            ['id_subgenero' => 98, 'id_genero' => 17, 'nombre_subgenero' => 'Noise'],
            ['id_subgenero' => 99, 'id_genero' => 17, 'nombre_subgenero' => 'Glitch'],
            ['id_subgenero' => 100, 'id_genero' => 17, 'nombre_subgenero' => 'Musique Concrète'],
        ];

        // 1) Deshabilitar FK
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 2) Truncar subgenero
        DB::table('subgenero')->truncate();

        // 3) Reactivar FK
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 4) Insertar subgéneros
        DB::table('subgenero')->insert($subgeneros);
    }
}
