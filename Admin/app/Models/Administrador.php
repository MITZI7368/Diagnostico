<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Administrador extends Authenticatable
{
    use HasFactory;

    protected $table = 'administradores';
    public $timestamps = false; 

    protected $fillable = [
        'nombre',
        'usuario',
        'password',
        'imagen_perfil',
        'rol',
        'estado',
    ];

    protected $hidden = [
        'password',
    ];
}
    



