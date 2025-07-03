<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedoresControl extends Controller
{
    // Mostrar formulario de creación
    public function crear()
    {
        return view('formularios.proveedor');
    }

    // Guardar proveedor
    public function guardar(Request $req)
    {
        $proveedor = new Proveedor($req->only([
            'nombre', 'direccion', 'telefono', 'email', 'nombre_contacto', 'contacto', 'estado'
        ]));
        $proveedor->save();

        return redirect()->route('proveedores.listar')->with('success', 'Proveedor registrado correctamente.');
    }

    // Mostrar detalles del proveedor
    public function detalle($id)
    {
        return view('detalle.detalle_proveedor', ['proveedor' => Proveedor::findOrFail($id)]);
    }

    // Listar proveedores
    public function listar()
    {
        return view('catalogo.proveedores', ['proveedores' => Proveedor::all()]);
    }

    // Mostrar formulario de edición
    public function editar($id)
    {
        return view('editar.editar_proveedor', ['proveedor' => Proveedor::findOrFail($id)]);
    }

    // Actualizar proveedor
    public function actualizar(Request $req, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($req->only([
            'nombre', 'direccion', 'telefono', 'email', 'nombre_contacto', 'contacto', 'estado'
        ]));

        return redirect()->route('proveedores.listar')->with('success', 'Proveedor actualizado correctamente.');
    }

    // Eliminar proveedor
    public function borrar($id)
    {
        Proveedor::findOrFail($id)->delete();
        return redirect()->route('proveedores.listar')->with('success', 'Proveedor eliminado correctamente.');
    }
}
