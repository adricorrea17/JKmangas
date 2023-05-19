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

        ]);
    }
}
