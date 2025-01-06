<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('update_news')->insert([
            'titulo' => "Noticia 1",
            'texto' => "no me pagan lo suficiente para escribir texto de verdad aqui",
        ]);

        DB::table('update_news')->insert([
            'titulo' => "Noticia 2",
            'texto' => "siguen sin pagarme lo suficiente para escribir texto de verdad aqui",
        ]);
    }
}
