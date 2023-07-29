<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            [
                'id' => 1,
                'categoria' => 'Prueba',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'categoria' => 'Mangas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'categoria' => 'Manhwas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
        ]);
    }
}
