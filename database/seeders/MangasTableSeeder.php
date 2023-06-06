<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MangasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('mangas')->insert([
            [
                'manga_id' => 1,
                'titulo' => 'Tokyo Ghoul',
                'precio' => 1999,
                'descripcion' => 'Se trata de una producción de terror con violencia explícita y ambientación sobrenatural que presenta una ciudad 
                de Tokio en la que mueren personas inocentes a manos de ghouls, seres misteriosos que se alimentan de humanos.',
                'portada' => 'tokyo-ghoul.png',
                'mangaka' => 'Sui Ishida',
                'tomos' => 8,
                'proximo_tomo' => '2023-01-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 2,
                'titulo' => 'Nanatsu no taizai',
                'precio' => 2199,
                'descripcion' => 'Nanatsu no Taizai (七つの大罪 lit. Los siete pecados capitales), comúnmente conocido como Los siete pecados 
                capitales en España y Hispanoamérica, es un serie de manga y anime escrita e ilustrada por Nakaba Suzuki, 
                serializada en la revista Weekly Shōnen Magazine de Kodansha desde el 10 de octubre del 2012.',
                'portada' => 'pecados.png',
                'mangaka' => 'Nakaba Suzuki',
                'tomos' => 13,
                'proximo_tomo' => '2022-12-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 3,
                'titulo' => 'Kimetsu no yaiba',
                'precio' => 1599,
                'descripcion' => 'La serie narra las desventuras de Tanjiro, un joven de un Japón feudal fantástico que se ve abocado a 
                la venganza después de que un demonio acabe con toda su familia, a excepción de su hermana, Nezuko, también demoníaca y 
                sedienta de sangre.',
                'portada' => 'kimetsu.png',
                'mangaka' => 'Koyoharu Gotouge',
                'tomos' => 4,
                'proximo_tomo' => '2024-01-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 4,
                'titulo' => 'Shingeki no Kyojin',
                'precio' => 3000,
                'descripcion' => 'Attack on Titan (進撃の巨人 Shingeki no Kyojin) es un manga serializado escrito e ilustrado por Hajime Isayama. 
                Cuenta la historia de la humanidad en una época con estética germana del siglo 19, 
                luchando por sobrevivir durante los ataques de unos seres humanoides gigantes llamados titanes.',
                'portada' => 'attack.png',
                'mangaka' => 'Hajime Isayama',
                'tomos' => 6,
                'proximo_tomo' => '2023-01-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
        DB::table('generos_mangas')->insert([
            [
                'manga_id' => 1,
                'genero_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'manga_id' => 1,
                'genero_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'manga_id' => 1,
                'genero_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'manga_id' => 2,
                'genero_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'manga_id' => 2,
                'genero_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 3,
                'genero_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 4,
                'genero_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 4,
                'genero_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 4,
                'genero_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
