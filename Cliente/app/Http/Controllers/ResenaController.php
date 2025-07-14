<?php

namespace App\Http\Controllers;

use App\Models\Resena;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResenaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'productos_id' => 'required|exists:productos,id',
            'comentario' => 'required|string',
            'calificacion' => 'required|integer|min:1|max:5',
        ]);

        Resena::updateOrCreate(
            [
                'productos_id' => $request->productos_id,
                'clientes_id' => auth()->id(),
            ],
            [
                'comentario' => $request->comentario,
                'calificacion' => $request->calificacion,
            ]
        );

        return redirect()->back()->with('success', 'Tu reseña ha sido guardada.');
    }

    public function destroy($id)
    {
        $resena = Resena::findOrFail($id);

        if ($resena->clientes_id !== auth()->id()) {
            abort(403, 'No puedes eliminar esta reseña.');
        }

        $resena->delete();

        return redirect()->back()->with('success', 'Tu reseña ha sido eliminada.');
    }
}
