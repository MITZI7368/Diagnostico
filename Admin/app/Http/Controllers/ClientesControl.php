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
        $clientes = Cliente::all();
        return view('catalogo.clientes', compact('clientes'));
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

        // Verifica si se subió una imagen en el formulario.
        if ($request->hasFile('imagen')) {
            // Guarda la imagen en la carpeta 'clientes' dentro del disco 'public' 
            // 'storage/clientes/nombre_del_archivo.jpg' será la ruta guardada en la base de datos.
            $cliente->imagen = $request->file('imagen')->store('clientes', 'public');
        }

        $cliente->save(); // Guarda la información del nuevo cliente en la base de datos.
        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.'); // Redirige a la lista de clientes con un mensaje de éxito.
    }

    // Muestra los detalles de un cliente específico.
    public function mostrarDetalles(Cliente $cliente)
    {
        return view('detalle.detalle_cliente', compact('cliente')); // Muestra la vista 'detalle.detalle_cliente' con la información del cliente.
        // 'compact('cliente')' es una forma corta de ['cliente' => $cliente].
    }

    // Muestra el formulario para editar la información de un cliente específico.
    public function mostrarFormularioEdicion(Cliente $cliente)
    {
        return view('editar.editar_cliente', compact('cliente')); // Muestra la vista 'editar.editar_cliente' con los datos del cliente a editar.
    }

    // Actualiza la información de un cliente específico en la base de datos.
    // En el método actualizarCliente
    public function actualizarCliente(Request $request, Cliente $cliente)
    {
        $cliente->nombre = $request->nombre; 
        $cliente->email = $request->email;
        // Solo actualizar la contraseña si se proporciona una nueva
        if ($request->contraseña) {
            $cliente->contraseña = bcrypt($request->contraseña);
        }
        $cliente->direccion = $request->direccion;
        $cliente->estado = $request->estado;
    
        if ($request->hasFile('imagen')) {
            Storage::disk('public')->delete($cliente->imagen);
            $cliente->imagen = $request->file('imagen')->store('clientes', 'public');
        }
    
        $cliente->save();
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