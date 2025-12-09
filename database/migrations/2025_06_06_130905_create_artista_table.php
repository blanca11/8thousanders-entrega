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
        Schema::create('artista', function (Blueprint $table) {
            $table->increments('id_artista');
            $table->string('nombre', 100);
            $table->string('ciudad', 50)->nullable();
            $table->string('pais', 50)->nullable();
            $table->unsignedInteger('id_genero');
            $table->unsignedInteger('id_subgenero');

            // Claves foráneas
            $table->foreign('id_genero')
                  ->references('id_genero')
                  ->on('genero')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('id_subgenero')
                  ->references('id_subgenero')
                  ->on('subgenero')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artista');
    }
};
