@extends('base.plantilla')

@section('contenido')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Mi Carrito de Compras</h1>

    <div class="bg-white shadow-md rounded-lg">
        @if(session('cart') && count(session('cart')) > 0)
            <div class="divide-y divide-gray-200">
                @foreach(session('cart') as $id => $item)
                    <div class="flex items-center p-4 producto-carrito" 
                         data-precio="{{ $item['precio'] }}"
                         data-id="{{ $id }}"
                         data-descuento="{{ $item['descuento'] ?? 0 }}">
                        <img src="http://127.0.0.1:8000/storage/{{ $item['imagen'] }}" 
                             alt="{{ $item['nombre'] }}" 
                             class="w-20 h-20 object-cover rounded">
                        
                        <div class="ml-4 flex-1">
                            <h3 class="text-lg font-semibold">{{ $item['nombre'] }}</h3>
                            @if(isset($item['descuento']) && $item['descuento'] > 0)
                                <div class="flex items-center gap-2">
                                    <p class="text-gray-600 line-through">${{ number_format($item['precio'], 2) }}</p>
                                    <p class="text-green-600 font-semibold">${{ number_format($item['precio'] * (1 - $item['descuento']/100), 2) }}</p>
                                    <span class="bg-red-500 text-white px-2 py-1 rounded text-sm">-{{ $item['descuento'] }}%</span>
                                </div>
                            @else
                                <p class="text-gray-600">${{ number_format($item['precio'], 2) }}</p>
                            @endif
                            
                            <div class="flex items-center mt-2">
                                <button class="bg-gray-200 px-3 py-1 rounded-l btn-decrementar">-</button>
                                <span class="px-4 py-1 bg-gray-100 cantidad">{{ $item['cantidad'] }}</span>
                                <button class="bg-gray-200 px-3 py-1 rounded-r btn-incrementar">+</button>
                                <button class="ml-4 text-red-600 hover:text-red-800 btn-eliminar">Eliminar</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="p-4 border-t border-gray-200">
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <span class="text-lg">Subtotal:</span>
                        <span class="text-lg" id="subtotal-carrito">
                            ${{ number_format(array_sum(array_map(fn($item) => $item['precio'] * $item['cantidad'], session('cart'))), 2) }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-lg">IVA (16%):</span>
                        <span class="text-lg" id="iva-carrito">
                            ${{ number_format(array_sum(array_map(fn($item) => $item['precio'] * $item['cantidad'], session('cart'))) * 0.16, 2) }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center font-bold">
                        <span class="text-xl">Total a Pagar:</span>
                        <span class="text-xl" id="total-carrito">
                            ${{ number_format(array_sum(array_map(fn($item) => $item['precio'] * $item['cantidad'], session('cart'))) * 1.16, 2) }}
                        </span>
                    </div>
                </div>
                <a href="{{ route('pedidos.crear') }}" class="mt-4 block w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 text-center">
                    Realizar Pedido
                </a>
                <a href="{{ route('catalogo.listado') }}" 
                   class="mt-2 block text-center bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">
                    Volver al Catálogo
                </a>
            </div>
        @else
            <div class="p-8 text-center">
                <p class="text-gray-600">No hay productos en tu carrito</p>
                <a href="{{ route('catalogo.listado') }}" 
                   class="mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">
                    Ver Productos
                </a>
            </div>
        @endif
    </div>
</div>

<script src="{{ asset('js/carrito.js') }}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection