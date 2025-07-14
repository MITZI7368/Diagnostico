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

   @php
    $miResena = $producto->resenas->where('cliente_id', auth()->id())->first();
@endphp

@if(Auth::check())
    <h3 class="text-lg font-bold mt-6">
        {{ $miResena ? 'Editar tu reseña' : 'Deja una reseña' }}
    </h3>

    <form action="{{ url('/resenas') }}" method="POST">
        @csrf
        <input type="hidden" name="producto_id" value="{{ $producto->id }}">

        <label>Comentario:</label>
        <textarea name="comentario" required class="w-full border p-2 mb-3">{{ old('comentario', $miResena->comentario ?? '') }}</textarea>

        <label>Calificación:</label>
        <div class="star-rating mb-3">
            @for ($i = 5; $i >= 1; $i--)
                <input type="radio" name="calificacion" id="estrella{{ $i }}" value="{{ $i }}"
                    {{ (old('calificacion', $miResena->calificacion ?? '') == $i) ? 'checked' : '' }}>
                <label for="estrella{{ $i }}">&#9733;</label>
            @endfor
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
            {{ $miResena ? 'Actualizar reseña' : 'Enviar reseña' }}
        </button>
    </form>

    @if($miResena)
        <form action="{{ route('resenas.destroy', $miResena->id) }}" method="POST" class="mt-2">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 underline">Eliminar reseña</button>
        </form>
    @endif
@else
    <p><a href="{{ route('login') }}" class="text-blue-500 underline">Inicia sesión</a> para dejar una reseña.</p>
@endif

<h3 class="mt-6 font-bold text-lg">Reseñas:</h3>

@forelse($producto->resenas as $resena)
    <div class="mb-4 border-b pb-2">
        <strong>{{ $resena->cliente->name }}</strong>
        <br>
        <div class="text-yellow-500">
            @for($i = 1; $i <= 5; $i++)
                @if($i <= $resena->calificacion)
                    &#9733;
                @else
                    &#9734;
                @endif
            @endfor
        </div>
        <p>{{ $resena->comentario }}</p>
        <small class="text-gray-600">{{ $resena->created_at->format('d/m/Y') }}</small>
    </div>
@empty
    <p>No hay reseñas aún.</p>
@endforelse
@endsection