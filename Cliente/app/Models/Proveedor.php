<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores'; 
    protected $primaryKey = 'id'; 
    public $timestamps = false; 

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'producto_id',
        'nombre_contacto',
        'contacto',
        'estado'
    ];
    // Relación con la tabla Productos (un proveedor puede tener muchos productos)
    public function productos()
    {
        return $this->hasMany(Producto::class, 'proveedor_id');
    }
}