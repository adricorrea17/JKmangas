<?php

namespace Database\Seeders;

use App\Models\Usuario;
use App\Models\UsuariosPagos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('usuarios')->insert([
            'id'=> 1,
            'nombre_usuario' => 'adriancorrea2405',
            'password' => Hash::make('adrian'),
            'email' => 'adriancorrea@2405.com',
            'imagen' => 'adrian.jpg',
            'usuarios_plan_id' => 3,
            'usuarios_rol_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach (range(2, 15) as $index) {
            $password = 'adrian';
            $hashedPassword = Hash::make($password);

            DB::table('usuarios')->insert([
                'id' => $index,
                'nombre_usuario' => $faker->userName,
                'password' => $hashedPassword,
                'email' => $faker->safeEmail,
                'imagen' => $faker->image('public/img/perfil', 200, 200, null, false),
                'usuarios_plan_id' => $faker->numberBetween(1, 3),
                'usuarios_rol_id' => $faker->numberBetween(1, 2),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);

            $plan = $faker->numberBetween(1, 3);

            if ($plan == 1) {
                $monto = 300;
            } elseif ($plan == 2) {
                $monto = 750;
            } elseif ($plan == 3) {
                $monto = 1300;
            } else {
                $monto = 0; 
            }

            DB::table('usuarios_pagos')->insert([
                'usuario_id' => $index,
                'mp_validacion' => 'Aprobada',
                'monto' => $monto,
                'plan_id' => $plan,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
