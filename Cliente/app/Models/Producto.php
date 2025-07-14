<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Desactivar timestamps (created_at y updated_at)
    public $timestamps = false;
    
    
    protected $table = 'productos';

    // Lista de campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'existencia',
        'descuento',
        'categoria_id',
        'subcategoria_id',
        'imagen',
        'modelado'
    ];

    // Relación con la categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relación con la subcategoría
    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    // Relación con el proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function resenas()
{
    return $this->hasMany(Resena::class);
}
}
