<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $precios = DB::table('usuarios_plans')->select('usuarios_plans.precio', 'usuarios_plans.id')->orderBy('id')->get();

        DB::table('usuarios')->insert([
            'id' => 1,
            'nombre_usuario' => 'adriancorrea2405',
            'password' => Hash::make('adrian'),
            'email' => 'adriancorrea@2405.com',
            'imagen' => 'adrian.jpg',
            'usuarios_plan_id' => 3,
            'usuarios_rol_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'fecha_cierre' => $faker->dateTimeBetween('now','+29 days'),
        ]);

        foreach (range(2, 100) as $index) {
            $password = 'adrian';
            $hashedPassword = Hash::make($password);
            $plan = $faker->numberBetween(0, count($precios));
            $update_at = $faker->dateTimeBetween('-29 days' , 'now');

            DB::table('usuarios')->insert([
                'id' => $index,
                'nombre_usuario' => $faker->userName,
                'password' => $hashedPassword,
                'email' => $faker->safeEmail,
                //'imagen' => $faker->image('public/img/perfil', 200, 200, null, false),
                'imagen' => null,
                'usuarios_plan_id' => $plan == 0 ? null : $plan,
                'usuarios_rol_id' => $faker->numberBetween(1, 2),
                'created_at' => $faker->dateTimeBetween('-1 year', '-1 month'),
                'updated_at' => $update_at,
                'fecha_cierre' => $update_at->modify('+1 month'),
            ]);

            $startDate = Carbon::now()->subMonths(1)->startOfDay();
            $endDate = Carbon::now()->startOfDay();
            $createdDate = $faker->dateTimeBetween($startDate, $endDate);

            if ($plan != 0) {
                $monto = $precios[$plan - 1]->precio;

                DB::table('usuarios_pagos')->insert([
                    'usuario_id' => $index,
                    'mp_validacion' => null,
                    'monto' => $monto,
                    'plan_id' => $plan,
                    'created_at' => $faker->dateTimeBetween($startDate, $endDate),
                    'updated_at' => $faker->dateTimeBetween($createdDate, 'now'),
                ]);
            }
        }
    }
}
