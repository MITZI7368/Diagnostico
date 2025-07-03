<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
   Schema::create('pedidos', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('cliente_id');
    $table->date('fecha_pedido');
    $table->string('estado');
    $table->decimal('total', 8, 2);
    $table->string('direccion_entrega');
    $table->decimal('iva', 8, 2)->nullable();
    $table->decimal('descuento', 8, 2)->nullable();
    $table->timestamps(); // o no, dependiendo de tu modelo
});

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido_productos');
    }
};
