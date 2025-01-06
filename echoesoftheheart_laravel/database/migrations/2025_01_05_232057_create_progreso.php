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
        Schema::create('progreso', function (Blueprint $table) {
            $table->id('id')->primary();

            $table->foreignId('user_id');
            $table->foreignId('dialogo_id');
            $table->foreignId('capitulo_id');


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('dialogo_id')->references('id')->on('dialogos');
            $table->foreign('capitulo_id')->references('id')->on('capitulos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progreso');
    }
};
