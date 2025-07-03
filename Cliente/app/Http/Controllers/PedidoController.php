<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function store(Request $request)
    {
        $carrito = (array) session('cart', []); 
        

        if (empty($carrito)) {
            return back()->with('error', 'Tu carrito está vacío.');
        }

        $pedido = Pedido::create([
            'clientes_id' => Auth::id(), 
            'fecha_pedido' => now(),
            'estado' => 'pendiente',
            'total' => collect($carrito)->sum(fn($item) => $item['precio'] * $item['cantidad']),
            'direccion_entrega' => $request->input('direccion'),
            'iva' => 0,
            'descuento' => 0,
        ]);

        foreach ($carrito as $item) {
            $pedido->productos()->attach($item['producto_id'], [
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio'],
            ]);
        }

        session()->forget('cart'); // Asegúrate de que esto concuerde con 'cart'
        return redirect()->route('dashboard')->with('success', 'Pedido realizado correctamente.');
    }

    public function crear()
    {
        $carrito = (array) session('cart', []); 
        
        $total = collect($carrito)->sum(fn($item) => $item['precio'] * $item['cantidad']);
        return view('welcome', compact('carrito', 'total'));
    }
}