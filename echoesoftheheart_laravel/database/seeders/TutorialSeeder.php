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
            'nombre' => "Tutorial",
            'descripcion' => "El tutorial",
        ]);

        // =========== personajes ===========
        DB::table('personajes')->insert([
            'nombre' => "tu",
            'descripcion' => "that's me",
            'url_img' => "about:blank",
            'tipo' => "normal",
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



    }
}
