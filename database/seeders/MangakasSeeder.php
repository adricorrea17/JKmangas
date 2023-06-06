<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MangakasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mangakas')->insert([
            [
                'id' => 1,
                'nombre' => 'Sui Ishida',
            ],
            [
                'id' => 2,
                'nombre' => 'Nakaba Suzuki',
            ],
            [
                'id' => 3,
                'nombre' => 'Koyoharu Gotouge',
            ],
            [
                'id' => 4,
                'nombre' => 'Hajime Isayama',
            ]
        ]);
    }
}
