<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenerosTableSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(MangasTableSeeder::class);
        $this->call(UsuariosPlansSeeder::class);
        $this->call(UsuariosRolSeeder::class);
        $this->call(UsuariosSeeder::class);
    }
}
