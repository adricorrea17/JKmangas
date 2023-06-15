<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            [   
                'manga_id'=> 5,
                'titulo' => 'Akame ga Kill!',
                'precio' => 999.99,
                'descripcion' => 'Tatsumi se une a Night Raid, un grupo de asesinos rebeldes que luchan contra el corrupto Imperio.',
                'portada' => 'akame.png',
                'mangaka' => 'Takahiro, Tetsuya Tashiro',
                'tomos' => 15,
                'proximo_tomo' => now()->addMonths(2)->toDateString(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'manga_id'=> 6,
                'titulo' => 'Blue Lock',
                'precio' => 899.99,
                'descripcion' => 'Un equipo de fútbol especializado en la delantera, donde todos los jugadores compiten para ser el número uno.',
                'portada' => 'blue.png',
                'mangaka' => 'Muneyuki Kaneshiro, Yusuke Nomura',
                'tomos' => 10,
                'proximo_tomo' => now()->addMonths(1)->toDateString(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   
                'manga_id' => 7,
                'titulo' => 'My Hero Academia',
                'precio' => 999.99,
                'descripcion' => 'Izuku Midoriya persigue su sueño de convertirse en un héroe en un mundo donde todos tienen superpoderes.',
                'portada' => 'myhero.png',
                'mangaka' => 'Kohei Horikoshi',
                'tomos' => 32,
                'proximo_tomo' => now()->addMonths(3)->toDateString(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   
                'manga_id'=> 8,
                'titulo' => 'Dr. Stone',
                'precio' => 899.99,
                'descripcion' => 'Después de que toda la humanidad queda petrificada, Senku despierta miles de años después y trabaja para reconstruir la civilización.',
                'portada' => 'doctor.png',
                'mangaka' => 'Riichiro Inagaki, Boichi',
                'tomos' => 22,
                'proximo_tomo' => now()->addMonths(1)->toDateString(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   
                'manga_id'=> 9,
                'titulo' => 'Black Clover',
                'precio' => 799.99,
                'descripcion' => 'Asta, un joven sin magia en un mundo lleno de ella, lucha por convertirse en el Rey Mago y proteger su reino.',
                'portada' => 'black.png',
                'mangaka' => 'Yuki Tabata',
                'tomos' => 28,
                'proximo_tomo' => now()->addMonths(2)->toDateString(),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   
                'manga_id'=> 10,
                'titulo' => 'One Punch Man',
                'precio' => 899.99,
                'descripcion' => 'Saitama, un superhéroe extremadamente poderoso, se enfrenta a enemigos poderosos con un solo golpe. ¡Descubre su historia hilarante!',
                'portada' => 'saitama.png',
                'mangaka' => 'ONE, Yusuke Murata',
                'tomos' => 23,
                'proximo_tomo' => now()->addMonths(3)->toDateString(),
                'created_at' => now(),
                'updated_at' => now()
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
                'manga_id' => 5,
                'genero_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 5,
                'genero_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 6,
                'genero_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 6,
                'genero_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 7,
                'genero_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 7,
                'genero_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 8,
                'genero_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 8,
                'genero_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 8,
                'genero_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 9,
                'genero_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 9,
                'genero_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 10,
                'genero_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'manga_id' => 10,
                'genero_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
