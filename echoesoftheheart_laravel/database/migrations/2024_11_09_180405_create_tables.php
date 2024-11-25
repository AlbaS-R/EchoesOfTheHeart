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




        Schema::create('ropa', function (Blueprint $table) {
            $table->id('id_Ropa')->primary();
            $table->string('Camisetas');
            $table->string('Pantalones');
            $table->string('Vestidos');
            $table->string('Zapatos');

        });

        Schema::create('fotos', function (Blueprint $table) {
            $table->id('id_Fotos')->primary();
            $table->string('imagen');


        });

        Schema::create('tipo_personaje', function (Blueprint $table) {
            $table->id('id_TipoPersonaje')->primary();
            $table->string('personajes_Amorosos');
            $table->string('personajes_Amigos');
            $table->string('personajes_Normales');

        });

        Schema::create('personaje', function (Blueprint $table) {
            $table->id('id_Psj')->primary();
            $table->string('nombre');
            $table->string('personaje_img');
            $table->string('descripcion');
            $table->integer('status');

            $table->foreignId('id_TipoPersonaje');
            $table->foreign('id_TipoPersonaje')->references('id_TipoPersonaje')->on('tipo_personaje');

        });


        Schema::create('progreso', function (Blueprint $table) {
            $table->id('id_Progreso')->primary();

        });

        Schema::create('capitulo', function (Blueprint $table) {
            $table->id('id')->primary();

            $table->string('capitulo');
            $table->string('dialogo');
            $table->string('historia');


            $table->foreignId('id_Progreso');
            $table->foreign('id_Progreso')->references('id_Progreso')->on('progreso');

        });




        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('esencias')->default('1000');
            $table->integer('dolares')->default('1000');
            $table->rememberToken();
            $table->timestamp('fecha_de_registro');

            $table->foreignId('id_ropa')->nullable();
            $table->foreignId('id_fotos')->nullable();
            $table->foreignId('id_psj')->nullable();
            $table->foreignId('id_progreso')->nullable();

            $table->foreign('id_ropa')->references('id_Ropa')->on('ropa');
            $table->foreign('id_fotos')->references('id_Fotos')->on('fotos');
            $table->foreign('id_psj')->references('id_Psj')->on('personaje');
            $table->foreign('id_progreso')->references('id_Progreso')->on('progreso');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('ropa');
        Schema::dropIfExists('fotos');
        Schema::dropIfExists('personaje');
        Schema::dropIfExists('tipo_personaje');
        Schema::dropIfExists('progreso');
        Schema::dropIfExists('capitulo');
    }
};
