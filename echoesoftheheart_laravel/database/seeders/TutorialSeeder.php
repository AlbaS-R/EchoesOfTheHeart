<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('capitulos')->insert([
            'titulo' => "Tutorial",
            'texto' => "El tutorial",
        ]);

        // =========== personajes ===========
        DB::table('personajes')->insert([
            'nombre' => "Amaranta",
            'descripcion' => "alguien",
            'url_img' => "about:blank",
            'tipo' => "normal",
        ]);

        DB::table('personajes')->insert([
            'nombre' => "Ajax",
            'descripcion' => "Async Javascript And Xml",
            'url_img' => "about:blank",
            'tipo' => "normal",
        ]);

        DB::table('personajes')->insert([
            'nombre' => "Elio",
            'descripcion' => "the lightest guy around",
            'url_img' => "about:blank",
            'tipo' => "normal",
        ]);

        // =========== textaco ===========
        DB::table('dialogos')->insert([
            'capitulo_id' => "1",
            'orden' => "1",
            'tipo' => "texto",
            'url_fondo' => "about:blank",
            'url_musica' => "about:blank",
            'personaje_id' => "1",
            'html' => "Despierta.",
        ]);

        DB::table('dialogos')->insert([
            'capitulo_id' => "1",
            'orden' => "2",
            'tipo' => "texto",
            'url_fondo' => "about:blank",
            'url_musica' => "about:blank",
            'personaje_id' => "",
            'html' => "[Escucho una suave voz que atraviesa la oscuridad.]",
        ]);
        DB::table('dialogos')->insert([
            'capitulo_id' => "1",
            'orden' => "3",
            'tipo' => "texto",
            'url_fondo' => "about:blank",
            'url_musica' => "about:blank",
            'personaje_id' => "1",
            'html' => "No lo haré dos veces. Despierta.",
        ]);
        DB::table('dialogos')->insert([
            'capitulo_id' => "1",
            'orden' => "4",
            'tipo' => "texto",
            'url_fondo' => "about:blank",
            'url_musica' => "about:blank",
            'personaje_id' => "",
            'html' => "[Abro los ojos lentamente. La pantalla se desvanece del negro, y frente a mí aparece un paisaje. Una mujer está de pie al fondo, observándome.]",
        ]);
        DB::table('dialogos')->insert([
            'capitulo_id' => "1",
            'orden' => "1",
            'tipo' => "texto",
            'url_fondo' => "about:blank",
            'url_musica' => "about:blank",
            'personaje_id' => "1",
            'html' => "Despierta.",
        ]);
        DB::table('dialogos')->insert([
            'capitulo_id' => "1",
            'orden' => "1",
            'tipo' => "texto",
            'url_fondo' => "about:blank",
            'url_musica' => "about:blank",
            'personaje_id' => "1",
            'html' => "Despierta.",
        ]);
        DB::table('dialogos')->insert([
            'capitulo_id' => "1",
            'orden' => "1",
            'tipo' => "texto",
            'url_fondo' => "about:blank",
            'url_musica' => "about:blank",
            'personaje_id' => "1",
            'html' => "Despierta.",
        ]);
        DB::table('dialogos')->insert([
            'capitulo_id' => "1",
            'orden' => "1",
            'tipo' => "texto",
            'url_fondo' => "about:blank",
            'url_musica' => "about:blank",
            'personaje_id' => "1",
            'html' => "Despierta.",
        ]);
        DB::table('dialogos')->insert([
            'capitulo_id' => "1",
            'orden' => "1",
            'tipo' => "texto",
            'url_fondo' => "about:blank",
            'url_musica' => "about:blank",
            'personaje_id' => "1",
            'html' => "Despierta.",
        ]);
        DB::table('dialogos')->insert([
            'capitulo_id' => "1",
            'orden' => "1",
            'tipo' => "texto",
            'url_fondo' => "about:blank",
            'url_musica' => "about:blank",
            'personaje_id' => "1",
            'html' => "Despierta.",
        ]);
        DB::table('dialogos')->insert([
            'capitulo_id' => "1",
            'orden' => "1",
            'tipo' => "texto",
            'url_fondo' => "about:blank",
            'url_musica' => "about:blank",
            'personaje_id' => "1",
            'html' => "Despierta.",
        ]);
        DB::table('dialogos')->insert([
            'capitulo_id' => "1",
            'orden' => "1",
            'tipo' => "texto",
            'url_fondo' => "about:blank",
            'url_musica' => "about:blank",
            'personaje_id' => "1",
            'html' => "Despierta.",
        ]);
        DB::table('dialogos')->insert([
            'capitulo_id' => "1",
            'orden' => "1",
            'tipo' => "texto",
            'url_fondo' => "about:blank",
            'url_musica' => "about:blank",
            'personaje_id' => "1",
            'html' => "Despierta.",
        ]);
    }
}
