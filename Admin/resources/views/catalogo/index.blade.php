@extends('base.plantilla')

@section('contenido')
<div class="container py-10">
    <h1 class="text-3xl font-bold text-center mb-8">Catálogo de Productos</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($productos as $producto)
            <div class="max-w-sm mx-auto bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                <img src="{{ asset('storage/' . $producto->imagen) }}" class="rounded-t-lg w-full h-64 object-cover" alt="Imagen del producto">
                <div class="p-4">
                    <h5 class="text-xl font-semibold text-gray-800">{{ $producto->nombre }}</h5>
                    <p class="text-gray-600 mt-2">{{ $producto->descripcion }}</p>
                    <p class="text-lg font-bold text-gray-900 mt-3"><strong>Precio:</strong> ${{ $producto->precio }}</p>
                    <a href="{{ route('productos.detalle', $producto->id) }}" class="mt-4 inline-block bg-blue-600 text-white 
                        px-6 py-2 rounded-lg text-center transition-colors hover:bg-blue-700">Ver Detalles</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

