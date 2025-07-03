@extends('base.plantilla')

@section('contenido')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Resumen del Pedido</h1>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(count($carrito) > 0)
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('paypal.checkout') }}" method="POST" class="space-y-6">
                @csrf

                <div class="mb-4">
                    <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Dirección de entrega:</label>
                    <input type="text" name="direccion" required 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-4">Productos en tu pedido:</h3>
                    <div class="divide-y divide-gray-200">
                        @foreach ($carrito as $item)
                            <div class="py-4 flex justify-between items-center">
                                <div class="flex-1">
                                    <h4 class="text-gray-800 font-medium">{{ $item['nombre'] }}</h4>
                                    <p class="text-gray-600">Cantidad: {{ $item['cantidad'] }}</p>
                                    <input type="hidden" name="productos[]" value="{{ json_encode($item) }}">
                                </div>
                                <div class="text-right">
                                    <p class="text-gray-800 font-semibold">${{ number_format($item['precio'] * $item['cantidad'], 2) }} MXN</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="border-t pt-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-600">Subtotal:</span>
                        <span class="text-gray-800">${{ number_format($total / 1.16, 2) }} MXN</span>
                    </div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-600">IVA (16%):</span>
                        <span class="text-gray-800">${{ number_format($total - ($total / 1.16), 2) }} MXN</span>
                    </div>
                    <div class="flex justify-between items-center text-lg font-bold">
                        <span>Total a Pagar:</span>
                        <span>${{ number_format($total, 2) }} MXN</span>
                    </div>
                </div>

                <div class="mt-6 space-y-3">
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline flex items-center justify-center">
                        <span class="mr-2">🧾</span> Pagar con PayPal
                    </button>
                    <a href="{{ route('catalogo.listado') }}" class="block text-center bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Volver al Catálogo
                    </a>
                </div>
            </form>
        </div>
    @else
        <div class="bg-white shadow-md rounded-lg p-8 text-center">
            <p class="text-gray-600 mb-4">Tu carrito está vacío</p>
            <a href="{{ route('catalogo.listado') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Ver Productos
            </a>
        </div>
    @endif
</div>
@endsection
