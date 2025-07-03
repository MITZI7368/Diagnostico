@extends('base.plantilla')

@section('contenido')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/2">
                @if($producto->imagen)
                    <img src="http://127.0.0.1:8000/storage/{{ $producto->imagen }}" 
                         alt="{{ $producto->nombre }}" 
                         class="w-full h-48 object-cover">
                @endif
            </div>
            <div class="p-8 md:w-1/2">
                <h1 class="text-3xl font-bold mb-4">{{ $producto->nombre }}</h1>
                <p class="text-gray-600 mb-4">{{ $producto->descripcion }}</p>
                <div class="mb-4">
                    @if($producto->descuento > 0)
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-2xl font-bold text-gray-400 line-through">
                                ${{ number_format($producto->precio, 2) }}
                            </span>
                            <span class="text-2xl font-bold text-green-600">
                                ${{ number_format($producto->precio * (1 - $producto->descuento/100), 2) }}
                            </span>
                            <span class="bg-red-500 text-white px-2 py-1 rounded text-sm">
                                -{{ $producto->descuento }}%
                            </span>
                        </div>
                    @else
                        <span class="text-2xl font-bold text-blue-600">
                            ${{ number_format($producto->precio, 2) }}
                        </span>
                    @endif
                </div>
                <p class="text-gray-600 mb-4">Existencia: {{ $producto->existencia }}</p>
                
                <form action="{{ route('carrito.agregar') }}" method="POST" class="mt-6">
                    @csrf
                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                    <button type="submit" 
                            class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700">
                        Agregar al Carrito
                    </button>
                </form>

                <a href="{{ route('catalogo.listado') }}" 
                   class="mt-4 inline-block text-blue-600 hover:underline">
                    ← Volver al catálogo
                </a>
            </div>
        </div>
    </div>
</div>
@endsection