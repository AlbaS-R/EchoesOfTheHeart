<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personajes', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('url_img');
            $table->enum('tipo', ['amoroso', 'amigo', 'normal']);
        });

        Schema::create('relaciones', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->foreignId('user_id');
            $table->foreignId('personaje_id');
            $table->integer('lovemeter');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('personaje_id')->references('id')->on('personajes');
        });


        Schema::create('capitulos', function (Blueprint $table) {
            $table->id('id')->primary();

            $table->string('nombre');
            $table->string('descripcion');
        });

        Schema::create('dialogos', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->foreignId('capitulo_id');
            $table->integer('orden');
            $table->enum('tipo', ['texto', 'elecion']);

            $table->string('url_fondo');
            $table->string('url_musica');
            $table->foreignId('personaje_id')->nullable();

            $table->text('html');

            $table->foreign('capitulo_id')->references('id')->on('capitulos');
            $table->foreign('personaje_id')->references('id')->on('personajes');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capitulos');

        Schema::dropIfExists('personaje');

    }
};
