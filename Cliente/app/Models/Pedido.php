<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Clave primaria de la tabla
    public $timestamps = false; // Indica si la tabla tiene columnas created_at y updated_at

    protected $fillable = [
        'clientes_id',
        'fecha_pedido',
        'estado',
        'total',
        'direccion_entrega',
        'iva',
        'descuento'
    ];

    // Relación con el modelo Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'clientes_id');
    }
    public function productos()
{
    return $this->belongsToMany(Producto::class, 'pedido_productos', 'pedido_id', 'producto_id')
                ->withPivot('cantidad', 'precio_unitario');
}
}