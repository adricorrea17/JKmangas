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
                'usuario_id' => 1,
                'nombre_usuario' => 'adriancorrea2405',
                'password' => Hash::make('adrian'),
                'email' => 'adriancorrea@2405.com',
                'perfil' => 'adrian.jpg',
                'rol' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 2,
                'nombre_usuario' => 'ElmaNiaco44',
                'password' => Hash::make('elma'),
                'email' => 'ElmaNiaco@44.com',
                'perfil' => 'elma.jpg',
                'rol' => 'UserComun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario_id' => 3,
                'nombre_usuario' => 'pepe',
                'password' => Hash::make('pepe'),
                'email' => 'pepe@44.com',
                'perfil' => null,
                'rol' => 'UserComun',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
