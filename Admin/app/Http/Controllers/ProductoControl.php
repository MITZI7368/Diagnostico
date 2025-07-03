<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;


class ProductoControl extends Controller
{
    public function crear()
    {
        return view('formularios.producto', [
            'categorias' => Categoria::all(),
            
        ]);
    }

    // Guardar producto en la base de datos
    // En el método guardar
    public function guardar(Request $req)
    {
        $producto = new Producto($req->only([
            'nombre', 'descripcion', 'precio', 'existencia', 'descuento', 'categoria_id' , 'imagen', 'modelado'
        ]));
    
        // Subir imagen
        if ($req->hasFile('imagen')) {
            $producto->imagen = $req->file('imagen')->store('productos', 'public');
        }
    
        // Subir archivo de modelado
        if ($req->hasFile('modelado')) {
            $producto->modelado = $req->file('modelado')->store('modelados', 'public');
        }
    
        $producto->save();
    
        return redirect()->route('catalogo.listado')->with('success', 'Producto registrado correctamente.');
    }

    // Mostrar detalles de un producto
    public function detalle($id)
    {
        return view('detalle.detalle_producto', ['producto' => Producto::findOrFail($id)]);
    }

    // Listar productos
    public function listaradmin()
    {
        return view('catalogo.listado', ['productos' => Producto::all()]);
    }

    public function listar()
    {
        return view('catalogo.index', ['productos' => Producto::all()]);
    }

    // Mostrar formulario de edición
    public function editar($id)
    {
        return view('editar.editar_producto', [
            'producto' => Producto::findOrFail($id),
            'categorias' => Categoria::all(),
            
        ]);
    }

    // Actualizar producto
    public function actualizar(Request $req, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->fill($req->only([
            'nombre', 'descripcion', 'precio', 'existencia', 'descuento', 'categoria_id', 'imagen', 'modelado'
        ]));

        if ($req->hasFile('imagen')) {
            $producto->imagen = $req->file('imagen')->store('productos', 'public');
        }

        // Actualizar código embed
        if ($req->modelado) {
            $producto->modelado = $req->modelado;
        }

        $producto->save();

        return redirect()->route('catalogo.listado')->with('success', 'Producto actualizado correctamente.');
    }

    // Eliminar producto
    public function borrar($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto->imagen) {
            unlink(storage_path('app/public/' . $producto->imagen));
        }

        $producto->delete();

        return redirect()->route('catalogo.listado')->with('success', 'Producto eliminado correctamente.');
    }
}
