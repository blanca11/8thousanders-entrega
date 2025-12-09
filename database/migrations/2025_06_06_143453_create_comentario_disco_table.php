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
        Schema::create('comentario_disco', function (Blueprint $table) {
            $table->increments('id_comentario_disco');
            $table->unsignedInteger('id_disco');
            $table->unsignedBigInteger('id_usuario');
            $table->text('comentario');
            $table->decimal('puntuacion', 3, 1);
            $table->foreign('id_disco')
                  ->references('id_disco')
                  ->on('disco')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('id_usuario')
                  ->references('id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentario_disco');
    }
};
