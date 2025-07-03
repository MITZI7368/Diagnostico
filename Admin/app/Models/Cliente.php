<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'email',
        'contraseña',
        'direccion',
        'imagen',
        'estado'
    ];
}
