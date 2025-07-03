<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientesControl extends Controller
{
    // Muestra una lista de todos los clientes.
    public function mostrarLista()
    {
        $clientes = Cliente::all(); // Obtiene todos los clientes de la base de datos.
        return view('catalogo.clientes', compact('clientes')); // Envía los clientes a la vista 'catalogo.clientes'.
    }

    // Muestra el formulario para crear un nuevo cliente.
    public function mostrarFormularioCreacion()
    {
        return view('catalogo.crear_cliente'); 
    }

    // Guarda la información de un nuevo cliente en la base de datos.
    public function guardarCliente(Request $request)
    {
        $cliente = new Cliente; 
        $cliente->nombre = $request->nombre; 
        $cliente->email = $request->email; 
        $cliente->contraseña = $request->contraseña; 
        $cliente->direccion = $request->direccion; 
        $cliente->estado = $request->estado; 
    
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/clientes');
            $cliente->imagen = str_replace('public/', '', $path);
        }
    
        $cliente->save();
        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    // Muestra los detalles de un cliente específico.
    public function mostrarDetalles(Cliente $cliente)
    {
        return view('detalle.detalle_cliente', compact('cliente')); // Muestra la vista 'detalle.detalle_cliente' con la información del cliente.
    }

    // Muestra el formulario para editar la información de un cliente específico.
    public function mostrarFormularioEdicion(Cliente $cliente)
    {
        return view('editar.editar_cliente', compact('cliente')); // Muestra la vista 'editar.editar_cliente' con los datos del cliente a editar.
    }

    // Actualiza la información de un cliente específico en la base de datos.
    public function actualizarCliente(Request $request, Cliente $cliente)
    {
        $cliente->nombre = $request->nombre; 
        $cliente->email = $request->email; // Actualiza el email.
        $cliente->contraseña = $request->contraseña; // Actualiza la contraseña.
        $cliente->direccion = $request->direccion; // Actualiza la dirección.
        $cliente->fecha_registro = $request->fecha_registro; // Actualiza la fecha de registro.
        $cliente->estado = $request->estado; // Actualiza el estado.

        // Verifica si se subió una nueva imagen.
        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existía.
            Storage::disk('public')->delete($cliente->imagen);
            // Guarda la nueva imagen.
            $cliente->imagen = $request->file('imagen')->store('clientes', 'public');
        }

        $cliente->save(); // Guarda los cambios en la base de datos.
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.'); 
    }

    // Elimina un cliente específico de la base de datos.
    public function eliminarCliente(Cliente $cliente)
    {
        // Elimina la imagen del cliente si existe.
        if ($cliente->imagen) {
            Storage::disk('public')->delete($cliente->imagen);
        }

        $cliente->delete(); // Elimina el cliente de la base de datos.
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.'); 
    }
}