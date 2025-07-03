<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Subcategoria;

class ProductoControl extends Controller
{
    public function crear()
    {
        return view('formularios.producto', [
            'categorias' => Categoria::all(),
            'subcategorias' => Subcategoria::all()
        ]);
    }

    // Guardar producto en la base de datos
    public function guardar(Request $req)
    {
        // Validar que el archivo sea .glb
        if ($req->hasFile('modelado')) {
            $req->validate([
                'modelado' => 'required|mimes:glb|max:10240' // máximo 10MB
            ]);
        }

        $producto = new Producto($req->only([
            'nombre', 'descripcion', 'precio', 'existencia', 'descuento', 'categoria_id', 'subcategoria_id'
        ]));
    
        if ($req->hasFile('imagen')) {
            $producto->imagen = $req->file('imagen')->store('productos', 'public');
        }
    
        if ($req->hasFile('modelado')) {
            $modelado = $req->file('modelado');
            $nombreArchivo = time() . '.' . $modelado->getClientOriginalExtension();
            $producto->modelado = $modelado->storeAs('modelados', $nombreArchivo, 'public');
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
        $productos = Producto::all();
        return view('catalogo.listado', ['productos' => $productos]);
    }

    public function listar(Request $request)
    {
        $query = Producto::query();
        
        if ($request->has('categoria')) {
            $categoria = $request->categoria;
            $query->whereHas('categoria', function($q) use ($categoria) {
                $q->where('nombre', 'like', '%' . $categoria . '%');
            });
        }
        
        $productos = $query->get();
        return view('catalogo.listado', ['productos' => $productos]);
    }

    // Mostrar formulario de edición
    public function editar($id)
    {
        return view('editar.editar_producto', [
            'producto' => Producto::findOrFail($id),
            'categorias' => Categoria::all(),
            'subcategorias' => Subcategoria::all()
        ]);
    }

    // Actualizar producto
    public function actualizar(Request $req, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->fill($req->only([
            'nombre', 'descripcion', 'precio', 'existencia', 'descuento', 'categoria_id', 'subcategoria_id'
        ]));

        // Verificar si se subió una imagen nueva
        if ($req->hasFile('imagen')) {
            $producto->imagen = $req->file('imagen')->store('productos', 'public');
        }

        // Verificar si se subió un archivo de modelado nuevo
        if ($req->hasFile('modelado')) {
            $producto->modelado = $req->file('modelado')->store('modelados', 'public');
        }

        $producto->save();

        return redirect()->route('catalogo.listado')->with('success', 'Producto actualizado correctamente.');
    }

    // Eliminar producto
    public function borrar($id)
    {
        $producto = Producto::findOrFail($id);

        // Eliminar archivos si existen
        if ($producto->imagen) {
            
            unlink(storage_path('app/public/' . $producto->imagen));
        }
        if ($producto->modelado) {
            unlink(storage_path('app/public/' . $producto->modelado));
        }

        $producto->delete();

        return redirect()->route('catalogo.listado')->with('success', 'Producto eliminado correctamente.');
    }
}
