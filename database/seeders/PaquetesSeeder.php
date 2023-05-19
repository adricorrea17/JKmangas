<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaquetesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paquetes')->insert([
            [
                'paquete_id' => 1,
                'nombre' => 'Otaku Junior',
                'duracion' => '3',
                'portada' => 'junior.png',
                'portada_perfil' => 'junior-perfil.png',
                'precio' => 300,
                'descripcion_paquete' => 'Este el el comienzo de tu camino ninja',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'paquete_id' => 2,
                'nombre' => 'Otaku Shōnen',
                'duracion' => '6',
                'portada' => 'ssj1.png',
                'portada_perfil' => 'ssj1-perfil.png',
                'precio' => 750,
                'descripcion_paquete' => 'Vas por buen camino mi joven otaku',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'paquete_id' => 3,
                'nombre' => 'Otaku-Sama',
                'duracion' => '12',
                'portada' => 'god.png',
                'portada_perfil' => 'god-perfil.png',
                'precio' => 1300,
                'descripcion_paquete' => 'Con esta membresia te convertiras en el dios de los otakus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
