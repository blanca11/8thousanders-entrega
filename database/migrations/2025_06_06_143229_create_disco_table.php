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
        Schema::create('disco', function (Blueprint $table) {
            $table->increments('id_disco');
            $table->unsignedInteger('id_artista');
            $table->string('titulo', 150);
            $table->foreign('id_artista')
                  ->references('id_artista')
                  ->on('artista')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disco');
    }
};
