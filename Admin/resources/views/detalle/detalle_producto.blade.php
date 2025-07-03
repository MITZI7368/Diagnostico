@extends('/base/plantilla')

@section('contenido')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Detalles del Producto</h2>

    <div class="mb-4">
        <strong>Nombre:</strong> {{ $producto->nombre }}
    </div>
    <div class="mb-4">
        <strong>Descripción:</strong> {{ $producto->descripcion }}
    </div>
    <div class="mb-4">
        <strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}
    </div>
    <div class="mb-4">
        <strong>Existencia:</strong> {{ $producto->existencia }}
    </div>
    <div class="mb-4">
        <strong>Descuento:</strong> {{ $producto->descuento }}%
    </div>
    <div class="mb-4">
        <strong>Estado:</strong> {{ $producto->estado }}
    </div>
    <div class="mb-4">
        <strong>Categoría:</strong> {{ $producto->categoria->nombre ?? 'N/A' }}
    </div>
    @if($producto->imagen)
    <div class="mb-4">
        <strong>Imagen:</strong><br>
        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" class="w-48 h-48">
    </div>
    @endif

    @if($producto->modelado)
    <div class="mb-4">
        <strong>Archivo de Modelado:</strong>
        <a href="{{ asset('storage/' . $producto->modelado) }}" download class="text-blue-500 underline">Descargar Modelado</a>
    </div>
    @endif

    <a href="{{ route('catalogo.listado') }}" class="text-white bg-blue-500 px-4 py-2 rounded">Volver al listado</a>
</div>
@endsection
