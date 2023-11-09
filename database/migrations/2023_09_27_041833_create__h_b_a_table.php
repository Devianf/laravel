<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_h_b_a', function (Blueprint $table) {
            $table->id('ID');
            $table->text('CATEGORIA');
            $table->string('CODPRODUCTO')->unique()->comment('El código del producto es único');
            $table->text('NOMPRODUCTO');
            $table->text('PROVEEDORES');
            $table->float('DOLARES');
            $table->float('SOLES');
            $table->float('VENTA');
            $table->float('UTILIDAD');
            $table->float('PROMOCION');
            $table->text('STOCK');
            $table->text('MARCA');
            $table->text('URLP')->nullable();
            $table->text('URLI')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_h_b_a');
    }
};
