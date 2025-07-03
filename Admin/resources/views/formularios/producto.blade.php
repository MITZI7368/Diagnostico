@extends('/base/plantilla')

@section('contenido')

<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Registrar Producto</h2>

    <form action="{{ route('productos.guardar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Nombre -->
        <div class="mb-4">
            <label class="block font-semibold">Nombre</label>
            <input type="text" name="nombre" class="w-full border rounded p-2" required>
        </div>

        <!-- Descripción -->
        <div class="mb-4">
            <label class="block font-semibold">Descripción</label>
            <textarea name="descripcion" class="w-full border rounded p-2"></textarea>
        </div>

        <!-- Categoría -->
        <div class="mb-4">
            <label class="block font-semibold">Categoría</label>
            <select id="categoria" name="categoria_id" class="w-full border rounded p-2" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Precio -->
        <div class="mb-4">
            <label class="block font-semibold">Precio</label>
            <input type="number" name="precio" step="0.01" class="w-full border rounded p-2" required>
        </div>

        <!-- Existencia -->
        <div class="mb-4">
            <label class="block font-semibold">Existencia</label>
            <input type="number" name="existencia" class="w-full border rounded p-2" required>
        </div>

        <!-- Descuento -->
        <div class="mb-4">
            <label class="block font-semibold">Descuento</label>
            <input type="number" name="descuento" step="0.01" class="w-full border rounded p-2">
        </div>
        
         <!-- Imagen -->
         <div class="mb-4">
            <label class="block font-semibold">Imagen</label>
            <input type="file" name="imagen"  class="w-full border rounded p-2" required>
        </div>

        <!-- Cambiando el input file por un textarea para el embed -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Modelo 3D formatos aceptados glb y gltf</label>
            <input type="file" name="modelado" accept=".glb,.gltf" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Botón de Enviar -->
        <div class="mb-4">
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 rounded hover:bg-blue-600">
                Registrar Producto
            </button>
        </div>
    </form>
</div>

@endsection
