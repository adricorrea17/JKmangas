<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'id' => 1,
                'nombre_usuario' => 'adriancorrea2405',
                'password' => Hash::make('adrian'),
                'email' => 'adriancorrea@2405.com',
                'imagen' => 'adrian.jpg',
                'usuarios_rol_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nombre_usuario' => 'ElmaNiaco44',
                'password' => Hash::make('elma'),
                'email' => 'elmaniaco@44.com',
                'imagen' => 'elma.jpg',
                'usuarios_rol_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nombre_usuario' => 'pepe',
                'password' => Hash::make('pepe'),
                'email' => 'pepe@44.com',
                'usuarios_rol_id' => 2,
                'imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
