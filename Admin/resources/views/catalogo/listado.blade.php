@extends('/base/plantilla')
@section('contenido')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-3 py-3">ID</th>
                <th class="px-3 py-3">Nombre</th>
                <th class="px-3 py-3">Descripción</th>
                <th class="px-3 py-3">Precio</th>
                <th class="px-3 py-3">Existencia</th>
                <th class="px-3 py-3">Descuento</th>
                <th class="px-3 py-3">Imagen</th>
                <th class="px-3 py-3">Modelado</th>
                <th class="px-3 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $prod)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-3 py-4">{{ $prod->id }}</td>
                <td class="px-3 py-4">{{ $prod->nombre }}</td>
                <td class="px-3 py-4">{{ $prod->descripcion }}</td>
                <td class="px-3 py-4">${{ number_format($prod->precio, 2) }}</td>
                <td class="px-3 py-4">{{ $prod->existencia }}</td>
                <td class="px-3 py-4">{{ $prod->descuento }}%</td>
                <td class="px-3 py-4">
                    <img src="{{ asset('storage/' . $prod->imagen) }}" alt="Imagen del producto" class="w-16 h-16">
                </td>
                <td class="px-6 py-4">
                    @if($prod->modelado)
                        <model-viewer
                            src="{{ asset('storage/' . $prod->modelado) }}"
                            alt="Modelo 3D del producto"
                            auto-rotate
                            camera-controls
                            style="width: 200px; height: 200px;">
                        </model-viewer>
                    @else
                        No disponible
                    @endif
                </td>
                <td class="px-3 py-4">
                    <a href="{{ route('productos.detalle', $prod->id) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Ver</a> |
                    <a href="{{ route('productos.editar', $prod->id) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Editar</a> |
                    <form action="{{ route('productos.borrar', $prod->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 dark:text-red-500 hover:underline">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection
