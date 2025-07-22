<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
    protected $fillable = ['producto_id', 'clientes_id', 'comentario', 'calificacion'];

    public function productos()
    {
        return $this->belongsTo(Producto::class);
    }

    public function clientes()
    {
        return $this->belongsTo(Cliente::class, 'clientes_id');
    }
}