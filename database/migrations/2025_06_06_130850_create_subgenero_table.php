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
        Schema::create('subgenero', function (Blueprint $table) {
            $table->increments('id_subgenero');
            // Clave foránea hacia genero.id_genero
            $table->unsignedInteger('id_genero');
            $table->string('nombre_subgenero', 50);
            
            // Índice y FK
            $table->foreign('id_genero')
                  ->references('id_genero')
                  ->on('genero')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subgenero');
    }
};
