<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function mostrarFormulario()
    {
        return view('auth.registro');
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:clientes',
            'contraseña' => 'required|min:6',
            'direccion' => 'nullable',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $datos = $request->except('_token');

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')->store('clientes', 'public');
        }

        $datos['contraseña'] = Hash::make($datos['contraseña']);
        $datos['estado'] = 'activo';

        Cliente::create($datos);

        return redirect()->route('login')
            ->with('success', 'Registro exitoso. Por favor inicia sesión.');
    }
}