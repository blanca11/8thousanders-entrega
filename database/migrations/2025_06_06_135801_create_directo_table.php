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
        Schema::create('directo', function (Blueprint $table) {
            $table->increments('id_directo');
            $table->unsignedInteger('id_artista');
            $table->unsignedInteger('id_lugar');

            $table->dateTime('fecha');
            $table->decimal('puntuacion', 3, 1)->nullable();

            // Claves foráneas: 
            $table->foreign('id_artista')
                  ->references('id_artista')
                  ->on('artista')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('id_lugar')
                  ->references('id_lugar')
                  ->on('lugar_directo')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directo');
    }
};
