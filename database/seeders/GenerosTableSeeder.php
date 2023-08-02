<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generos')->insert([
            [
                'genero_id' => 1,
                'nombre' => 'Nekketsu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 2,
                'nombre' => 'Spokon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 3,
                'nombre' => 'Gekiga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 4,
                'nombre' => 'Yuri',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 5,
                'nombre' => 'Yaoi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 6,
                'nombre' => 'Harem',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 7,
                'nombre' => 'Ecchi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 8,
                'nombre' => 'Mecha',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 9,
                'nombre' => 'Jidaimono',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 10,
                'nombre' => 'Gore',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 11,
                'nombre' => 'Mahō Shōjo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 12,
                'nombre' => 'Acción',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 13,
                'nombre' => 'Aventura',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 14,
                'nombre' => 'Horror',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 15,
                'nombre' => 'Fantasía',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 16,
                'nombre' => 'Drama',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 17,
                'nombre' => 'Comedia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 18,
                'nombre' => 'Misterio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 19,
                'nombre' => 'Ciencia Ficción',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 20,
                'nombre' => 'Romance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 21,
                'nombre' => 'Supernatural',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'genero_id' => 22,
                'nombre' => 'Webtoon',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
