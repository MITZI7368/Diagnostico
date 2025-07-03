@extends('/base/plantilla')
@section('contenido')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-3 py-3">ID</th>
                <th class="px-3 py-3">Nombre</th>
                <th class="px-3 py-3">Dirección</th>
                <th class="px-3 py-3">Teléfono</th>
                <th class="px-3 py-3">Email</th>
                <th class="px-3 py-3">Nombre de Contacto</th>
                <th class="px-3 py-3">Contacto</th>
                <th class="px-3 py-3">Estado</th>
                <th class="px-3 py-3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $prov)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-3 py-4">{{ $prov->id }}</td>
                <td class="px-3 py-4">{{ $prov->nombre }}</td>
                <td class="px-3 py-4">{{ $prov->direccion }}</td>
                <td class="px-3 py-4">{{ $prov->telefono }}</td>
                <td class="px-3 py-4">{{ $prov->email }}</td>
                <td class="px-3 py-4">{{ $prov->nombre_contacto }}</td>
                <td class="px-3 py-4">{{ $prov->contacto }}</td>
                <td class="px-3 py-4">{{ $prov->estado }}</td>
                <td class="px-3 py-4">
                    <a href="{{ route('proveedores.detalle', $prov->id) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Ver</a> |
                    <a href="{{ route('proveedores.editar', $prov->id) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Editar</a> |
                    <form action="{{ route('proveedores.borrar', $prov->id) }}" method="POST" class="inline">
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
