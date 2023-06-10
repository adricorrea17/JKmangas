<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios_plans')->insert([
            [
                'nombre' => 'Otaku Junior',
                'imagen' => 'junior.png',
                'precio' => 300,
                'descripcion' => 'Con este plan tendras via libre para leer los mangas que quieras',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Otaku Shōnen',
                'imagen' => 'ssj1.png',
                'precio' => 750,
                'descripcion' => 'Con este plan tendras via libre para leer los mangas y los manhwas que quieras',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Otaku-Sama',
                'imagen' => 'god.png',
                'precio' => 1300,
                'descripcion' => 'Con este plan ademas de lo anterior podras adquirir el tomo en fisico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
