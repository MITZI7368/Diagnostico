<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


Schema::create('mensajes', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');
    $table->string('email');
    $table->string('telefono')->nullable();
    $table->text('mensaje');
    $table->timestamp('leido_at')->nullable();
    $table->timestamps();
});

