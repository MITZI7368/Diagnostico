@extends('base.plantilla')

@section('contenido')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Editar Cliente</h2>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ $cliente->nombre }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ $cliente->email }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="contraseña" class="block text-sm font-medium text-gray-700">Nueva Contraseña (Dejar en blanco para no cambiar)</label>
            <input type="password" id="contraseña" name="contraseña" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            <small class="text-gray-500">Si dejas este campo en blanco, la contraseña actual no se modificará.</small>
        </div>

        <div class="mb-4">
            <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
            <input type="text" id="direccion" name="direccion" value="{{ $cliente->direccion }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
            <input type="text" id="estado" name="estado" value="{{ $cliente->estado }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
            <input type="file" id="imagen" name="imagen" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            @if ($cliente->imagen)
                <img src="{{ asset('storage/' . $cliente->imagen) }}" alt="Imagen actual del cliente" class="w-24 h-24 rounded-full mt-2">
            @endif
            <small class="text-gray-500">Selecciona una nueva imagen para reemplazar la actual.</small>
        </div>

        <div class="mb-4">
            <button type="submit" class="text-white bg-blue-500 px-4 py-2 rounded">Actualizar Cliente</button>
        </div>
    </form>

    <a href="{{ route('clientes.index') }}" class="text-white bg-gray-500 px-4 py-2 rounded">Cancelar</a>
</div>
@endsection