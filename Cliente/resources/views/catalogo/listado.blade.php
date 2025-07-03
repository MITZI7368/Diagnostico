@extends('base.plantilla')

@section('contenido')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Productos de {{ $categoriaBD->nombre }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($productos as $producto)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    @if($producto->imagen)
                    <img src="http://127.0.0.1:8000/storage/{{ $producto->imagen }}" 
                         alt="{{ $producto->nombre }}" 
                         class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $producto->nombre }}</h3>
                        <p class="text-gray-600 mb-2">{{ $producto->descripcion }}</p>
                        <p class="text-lg font-bold text-blue-600">${{ number_format($producto->precio, 2) }}</p>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-sm text-gray-500">Existencia: {{ $producto->existencia }}</span>
                            @if($producto->descuento > 0)
                                <span class="bg-red-500 text-white px-2 py-1 rounded text-sm">
                                    -{{ $producto->descuento }}%
                                </span>
                            @endif
                        </div>
                    
                        <!-- Botones de Ver y Agregar al Carrito -->
                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('producto.detalle', $producto->id) }}" 
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Ver Detalles
                            </a>
                            <form action="{{ route('carrito.agregar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                <button type="submit" 
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Agregar al Carrito
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 col-span-3">No hay productos en esta categoría.</p>
            @endforelse
        </div>
    </div>
@endsection
