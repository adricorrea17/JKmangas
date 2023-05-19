<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosTienenPaquetesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios_tienen_paquetes')->insert([
            [
                'usuario_id' => 1,
                'paquete_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 2,
                'paquete_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 3,
                'paquete_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
