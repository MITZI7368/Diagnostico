<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('resenas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('productos_id')
                ->constrained('productos')
                ->onDelete('cascade');

            $table->foreignId('clientes_id')
                ->constrained('clientes')
                ->onDelete('cascade');

            $table->text('comentario');
            $table->unsignedTinyInteger('calificacion');
            $table->timestamps();

            $table->unique(['producto_id', 'clientes_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resenas');
    }
};
