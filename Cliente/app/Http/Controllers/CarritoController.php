<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    // Muestra la página del carrito
    public function carrito()
    {
        // Simplemente muestra la vista del carrito
        return view('carrito.carrito');
    }

    // Agrega un producto al carrito
    public function agregar(Request $request)
    {
        
        $producto = Producto::findOrFail($request->producto_id);
        

        // Obtiene el carrito actual de la sesión o crea uno vacío
        $carrito = (array) session()->get('cart', []); 
       

        // Revisa si el producto ya está en el carrito
        if (isset($carrito[$request->producto_id])) {
            // Si existe, aumenta la cantidad en 1
            $carrito[$request->producto_id]['cantidad'] += 1;
        } else {
            // Si no existe, agrega el producto al carrito
            $carrito[$request->producto_id] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->imagen,
                "descuento" => $producto->descuento
            ];
        }

        // Guarda el carrito actualizado en la sesión
        session()->put('cart', $carrito);

        // Regresa a la página anterior con mensaje de éxito
        return redirect()->back()->with('success', 'El producto se agregó al carrito');
    }

    // Elimina un producto del carrito
    public function eliminar($id)
    {
        // Obtiene el carrito actual
        $carrito = (array) session()->get('cart', []); 
        dd($carrito);

        // Si el producto existe en el carrito, lo elimina
        if (isset($carrito[$id])) {
            unset($carrito[$id]);

            // Actualiza el carrito en la sesión
            session()->put('cart', $carrito);

            return response()->json(['success' => true]);
        }

        // Si no se encontró el producto, responde con error
        return response()->json(['success' => false]);
    }
}