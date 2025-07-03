@extends('base.plantilla')

@section('contenido')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Editar Producto</h2>

    <form action="{{ route('productos.actualizar', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="3" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
            <input type="number" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" step="0.01" required>
        </div>

        <div class="mb-4">
            <label for="existencia" class="block text-sm font-medium text-gray-700">Existencia</label>
            <input type="number" id="existencia" name="existencia" value="{{ old('existencia', $producto->existencia) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <div class="mb-4">
            <label for="descuento" class="block text-sm font-medium text-gray-700">Descuento (%)</label>
            <input type="number" id="descuento" name="descuento" value="{{ old('descuento', $producto->descuento) }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" step="0.01" required>
        </div>

        <div class="mb-4">
            <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría</label>
            <select id="categoria_id" name="categoria_id" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                <option value="" disabled>Selecciona una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $categoria->id == old('categoria_id', $producto->categoria_id) ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen del Producto</label>
            @if($producto->imagen)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" class="w-32 h-32">
                </div>
            @endif
            <input type="file" id="imagen" name="imagen" accept="image/*" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Modelo 3D formatos aceptados glb y gltf</label>
            @if($producto->modelado)
                <div class="mb-2">
                    <a href="{{ asset('storage/' . $producto->modelado) }}" class="text-blue-600 hover:text-blue-800 underline">Ver modelo actual</a>
                </div>
            @endif
            <input type="file" name="modelado" accept=".glb,.gltf" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        

        <div class="mb-4">
            <button type="submit" class="text-white bg-blue-500 px-4 py-2 rounded">Actualizar Producto</button>
        </div>
    </form>

    <a href="{{ route('catalogo.listado') }}" class="text-white bg-gray-500 px-4 py-2 rounded">Cancelar</a>
</div>
@endsection
