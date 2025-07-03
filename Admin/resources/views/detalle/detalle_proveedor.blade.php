@extends('base.plantilla')

@section('contenido')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Detalle del Proveedor</h2>

    @if ($proveedor)
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
            <p class="mt-1">{{ $proveedor->nombre }}</p>
        </div>

        <div class="mb-4">
            <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección:</label>
            <p class="mt-1">{{ $proveedor->direccion }}</p>
        </div>

        <div class="mb-4">
            <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono:</label>
            <p class="mt-1">{{ $proveedor->telefono }}</p>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <p class="mt-1">{{ $proveedor->email }}</p>
        </div>

        <div class="mb-4">
            <label for="nombre_contacto" class="block text-sm font-medium text-gray-700">Nombre de Contacto:</label>
            <p class="mt-1">{{ $proveedor->nombre_contacto }}</p>
        </div>

        <div class="mb-4">
            <label for="contacto" class="block text-sm font-medium text-gray-700">Contacto:</label>
            <p class="mt-1">{{ $proveedor->contacto }}</p>
        </div>

        <div class="mb-4">
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado:</label>
            <p class="mt-1">{{ $proveedor->estado }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('proveedores.listar') }}" class="text-blue-500 hover:underline">Volver a la lista de proveedores</a>
        </div>
    @else
        <p class="text-red-500">Proveedor no encontrado.</p>
    @endif
</div>
@endsection