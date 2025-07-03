@extends('base.plantilla')

@section('contenido')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Editar Proveedor</h2>

    <form action="{{ route('proveedores.actualizar', $proveedor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Proveedor</label>
            <input type="text" id="nombre" name="nombre" value="{{ $proveedor->nombre }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
            <input type="text" id="direccion" name="direccion" value="{{ $proveedor->direccion }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
            <input type="text" id="telefono" name="telefono" value="{{ $proveedor->telefono }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ $proveedor->email }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="nombre_contacto" class="block text-sm font-medium text-gray-700">Nombre de Contacto</label>
            <input type="text" id="nombre_contacto" name="nombre_contacto" value="{{ $proveedor->nombre_contacto }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="contacto" class="block text-sm font-medium text-gray-700">Contacto</label>
            <input type="text" id="contacto" name="contacto" value="{{ $proveedor->contacto }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
            <input type="text" id="estado" name="estado" value="{{ $proveedor->estado }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <button type="submit" class="text-white bg-blue-500 px-4 py-2 rounded">Actualizar Proveedor</button>
        </div>
    </form>

    <a href="{{ route('proveedores.listar') }}" class="text-white bg-gray-500 px-4 py-2 rounded">Cancelar</a>
</div>
@endsection