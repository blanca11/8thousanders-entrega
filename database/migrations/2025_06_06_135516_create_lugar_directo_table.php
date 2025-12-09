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
        Schema::create('lugar_directo', function (Blueprint $table) {
            // id_lugar: INT UNSIGNED AUTO_INCREMENT
            $table->increments('id_lugar');

            $table->string('ciudad', 50);
            $table->string('nombre', 100);
            $table->boolean('es_festival')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lugar_directo');
    }
};
