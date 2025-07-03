<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cliente extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $table = 'clientes';
    
    protected $fillable = [
        'nombre',
        'email',
        'contraseña',
        'direccion',
        'imagen',
        'estado'
    ];

    protected $hidden = [
        'contraseña',
        'remember_token',
    ];

    // Important: This tells Laravel which column to use for the password
    public function getAuthPassword()
    {
        return $this->contraseña;
    }
}
