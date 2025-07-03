<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class CatalogoController extends Controller
{
    public function listado($categoria = null)
{
    if (!$categoria) {
        // Mostrar todos los productos si no se especifica categoría
        $productos = Producto::with('categoria')->get(); // Corregido $producto a $productos
        return view('catalogo.listado', [
            'productos' => $productos,
            'categoriaBD' => (object)['nombre' => 'Todos los productos']
        ]);
    }

        // Buscar la categoría en la base de datos
        $categoriaBD = Categoria::where('nombre', $categoria)->first();

        // Si no existe la categoría, redirige a la página principal con un mensaje
        if (!$categoriaBD) {
            return redirect('/')->with('error', 'Categoría no encontrada');
        }

        // Buscar los productos que tienen la categoría encontrada
        $productos = Producto::where('categoria_id', $categoriaBD->id)->get();

        // ENVIAR LA VARIABLE
        return view('catalogo.listado', compact('productos', 'categoriaBD'));
    }
}

