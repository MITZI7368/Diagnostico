@extends('base.plantilla')

@section('contenido')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Detalle del Cliente</h2>

    @if ($cliente)
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
            <p class="mt-1">{{ $cliente->nombre }}</p>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <p class="mt-1">{{ $cliente->email }}</p>
        </div>

        <div class="mb-4">
            <label for="contraseña" class="block text-sm font-medium text-gray-700">Contraseña:</label>
            <p class="mt-1">******** (Contraseña encriptada)</p> {{-- Por seguridad, no mostrar la contraseña --}}
        </div>

        <div class="mb-4">
            <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección:</label>
            <p class="mt-1">{{ $cliente->direccion }}</p>
        </div>

        <div class="mb-4">
            <label for="fecha_registro" class="block text-sm font-medium text-gray-700">Fecha de Registro:</label>
            <p class="mt-1">{{ $cliente->fecha_registro }}</p>
        </div>

        <div class="mb-4">
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado:</label>
            <p class="mt-1">{{ $cliente->estado }}</p>
        </div>

        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen:</label>
            @if ($cliente->imagen)
                <img src="{{ asset('storage/' . $cliente->imagen) }}" alt="Imagen del cliente" class="w-32 h-32 rounded-full">
            @else
                <p class="mt-1 text-gray-500">No hay imagen asociada.</p>
            @endif
        </div>

        <div class="mt-6">
            <a href="{{ route('clientes.index') }}" class="text-blue-500 hover:underline">Volver a la lista de clientes</a>
        </div>
    @else
        <p class="text-red-500">Cliente no encontrado.</p>
    @endif
</div>
@endsection