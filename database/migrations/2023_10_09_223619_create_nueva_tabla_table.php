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
        Schema::create('nueva_tabla', function (Blueprint $table) {
            $table->id();
            $table->string('codProduc');
            $table->string('image_url')->unique(); // Asegúrate de que la URL de la imagen sea única en esta tabla
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nueva_tabla');
    }
};