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
                'descripcion' => 'Este el el comienzo de tu camino ninja',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Otaku Shōnen',
                'imagen' => 'ssj1.png',
                'precio' => 750,
                'descripcion' => 'Vas por buen camino mi joven otaku',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Otaku-Sama',
                'imagen' => 'god.png',
                'precio' => 1300,
                'descripcion' => 'Con esta membresia te convertiras en el dios de los otakus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
