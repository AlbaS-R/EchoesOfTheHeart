<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ImagenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fotos')->insert([
            'url' => "https://echoesoftheheart.subpolygon.com/media_juego/img_Escena/imagen_helio.png",
        ]);
    }
}
