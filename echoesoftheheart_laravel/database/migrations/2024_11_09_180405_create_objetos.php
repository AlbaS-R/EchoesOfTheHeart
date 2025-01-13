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
            $table->id('foto_id')->primary();
            $table->string('url');

        });




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ropa');
        Schema::dropIfExists('fotos');


    }
};
