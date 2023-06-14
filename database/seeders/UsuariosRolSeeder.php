<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsuariosRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un usuario con rol "administrador"
        DB::table('usuarios_rols')->insert([
            [
                'id' => 1,
                'rol' => 'Administrador',
            ],
            [
                'id' => 2,
                'rol' => 'Usuario Comun',
            ],
            [
                'id' => 3,
                'rol' => 'Baneado',
            ]
        ]);
    }
}
