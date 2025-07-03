@extends('base.plantilla')

@section('contenido')
<div class="bg-gradient-to-r from-blue-100 to-blue-50 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Banner de Bienvenida -->
        <div class="bg-blue-800 text-white rounded-lg p-8 mb-8 shadow-lg">
            <h1 class="text-3xl font-bold mb-2">Bienvenido al Panel de Administración</h1>
            <p class="text-blue-100">Sistema de Gestión de Diagnóstico Médico</p>
        </div>

        <!-- Tarjetas de Acceso Rápido -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-blue-600">
                <img src="{{ asset('productoss.jpeg') }}" alt="Productos" class="w-16 h-16 mb-4">
                <h2 class="text-xl font-bold text-gray-800 mb-2">Gestión de Productos</h2>
                <p class="text-gray-600 mb-4">Administra el catálogo de productos médicos</p>
                <a href="{{ route('productos.listar') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    Ir a Productos →
                </a>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-blue-600">
                <img src="{{ asset('clientes.jpeg') }}" alt="Clientes" class="w-16 h-16 mb-4">
                <h2 class="text-xl font-bold text-gray-800 mb-2">Gestión de Clientes</h2>
                <p class="text-gray-600 mb-4">Administra la información de los clientes</p>
                <a href="{{ route('clientes.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    Ir a Clientes →
                </a>
            </div>

            <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-blue-600">
                <img src="{{ asset('provedorees.jpeg') }}" alt="Proveedores" class="w-16 h-16 mb-4">
                <h2 class="text-xl font-bold text-gray-800 mb-2">Gestión de Proveedores</h2>
                <p class="text-gray-600 mb-4">Administra los proveedores del sistema</p>
                <a href="{{ route('proveedores.listar') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    Ir a Proveedores →
                </a>
            </div>
        </div>

        <!-- Estadísticas o Información Adicional -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Información del Sistema</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="p-4 bg-blue-50 rounded-lg">
                    <p class="text-sm text-blue-600">Total Productos</p>
                    <p class="text-2xl font-bold text-blue-800">{{ \App\Models\Producto::count() }}</p>
                </div>
                <div class="p-4 bg-blue-50 rounded-lg">
                    <p class="text-sm text-blue-600">Total Clientes</p>
                    <p class="text-2xl font-bold text-blue-800">{{ \App\Models\Cliente::count() }}</p>
                </div>
                <div class="p-4 bg-blue-50 rounded-lg">
                    <p class="text-sm text-blue-600">Total Proveedores</p>
                    <p class="text-2xl font-bold text-blue-800">{{ \App\Models\Proveedor::count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection