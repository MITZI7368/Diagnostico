@extends('/base/plantilla')
@section('contenido')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-3 py-3">ID</th>
                <th class="px-3 py-3">Nombre</th>
                <th class="px-3 py-3">Email</th>
                <th class="px-3 py-3">Dirección</th>
                <th class="px-3 py-3">Estado</th>
                <th class="px-3 py-3">Imagen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-3 py-4">{{ $cliente->id }}</td>
                <td class="px-3 py-4">{{ $cliente->nombre }}</td>
                <td class="px-3 py-4">{{ $cliente->email }}</td>
                <td class="px-3 py-4">{{ $cliente->direccion }}</td>
                <td class="px-3 py-4">{{ $cliente->estado }}</td>
                <td class="px-3 py-4">
                    @if($cliente->imagen)
                        <img src="{{ asset('storage/' . $cliente->imagen) }}" 
                             alt="{{ $cliente->nombre }}" 
                             class="w-16 h-16 object-cover rounded">
                    @else
                        <span class="text-gray-400">Sin imagen</span>
                    @endif
                </td>
                <td class="px-3 py-4">
                    <a href="{{ route('clientes.show', $cliente->id) }}" 
                       class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-1 px-3 rounded mr-1">
                        Ver
                    </a>
                    <a href="{{ route('clientes.edit', $cliente->id) }}" 
                       class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-1 px-3 rounded mr-1">
                        Editar
                    </a>
                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-1 px-3 rounded">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection