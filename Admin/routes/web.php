<?php

use App\Http\Controllers\AdministradoresControl;
use App\Http\Controllers\ProductoControl;
use App\Http\Controllers\ClientesControl; 
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ProveedoresControl;
Route::get('/', function () {
    return view('formularios.login');
});

// Vistas estáticas
Route::view('/plantilla', 'base.plantilla');
Route::view('/categorias', 'catalogo.filtrado');
Route::view('/tabla', 'catalogo.listado');
Route::view('/validacion', 'catalogo.cliente');
Route::view('/barra', 'buscador.search');

// Autenticación de administradores
Route::post('/admin/login', [AdministradoresControl::class, 'authenticate'])->name('admin.login');
Route::post('/admin/logout', [AdministradoresControl::class, 'out'])->name('admin.logout');

// Catálogo (Administradores)
Route::get('/admin/productos', [ProductoControl::class, 'listaradmin'])->name('catalogo.listado');

// Formulario de productos
Route::get('/productos/crear', [ProductoControl::class, 'crear'])->name('productos.crear');
Route::post('/productos/guardar', [ProductoControl::class, 'guardar'])->name('productos.guardar');

// Administración de productos
// Listar productos
Route::get('/productos', [ProductoControl::class, 'listar'])->name('productos.listar');

// Mostrar detalle de un producto
Route::get('/productos/{id}', [ProductoControl::class, 'detalle'])->name('productos.detalle');

// Formulario para crear producto
Route::get('/productos/crear', [ProductoControl::class, 'crear'])->name('productos.crear');
Route::post('/productos', [ProductoControl::class, 'guardar'])->name('productos.guardar');

// Formulario para editar producto
Route::get('/productos/{id}/editar', [ProductoControl::class, 'editar'])->name('productos.editar');
Route::put('/productos/{id}', [ProductoControl::class, 'actualizar'])->name('productos.actualizar');

// Eliminar producto
Route::delete('/productos/{id}', [ProductoControl::class, 'borrar'])->name('productos.borrar');

// Rutas para Clientes
Route::resource('clientes', ClientesControl::class);

// Registro de un administrador
Route::get('/registro', function () {
    DB::table('administradores')->insert([
        'nombre' => 'Jaime Kael Farias',
        'usuario' => 'JAI',
        'password' => Hash::make('utj'),
        'imagen_perfil' => 'administradores/admin_default.png',
        'rol' => 'admin',
        'estado' => 'activo',
    ]);
    return "Usuario registrado";
});

// CRUD de Proveedores
Route::get('/proveedores', [ProveedoresControl::class, 'listar'])->name('proveedores.listar');
Route::get('/proveedores/crear', [ProveedoresControl::class, 'crear'])->name('proveedores.crear');
Route::post('/proveedores', [ProveedoresControl::class, 'guardar'])->name('proveedores.guardar');
Route::get('/proveedores/{id}/editar', [ProveedoresControl::class, 'editar'])->name('proveedores.editar');
Route::put('/proveedores/{id}', [ProveedoresControl::class, 'actualizar'])->name('proveedores.actualizar');
Route::delete('/proveedores/{id}', [ProveedoresControl::class, 'borrar'])->name('proveedores.borrar');

Route::get('/proveedores/{id}', [ProveedoresControl::class, 'detalle'])->name('proveedores.detalle');

// Rutas para la gestión de Clientes (CRUD)
// Rutas para Clientes
Route::get('/clientes', [ClientesControl::class, 'mostrarLista'])->name('clientes.index');
Route::get('/clientes/crear', [ClientesControl::class, 'mostrarFormularioCreacion'])->name('clientes.create');
Route::post('/clientes', [ClientesControl::class, 'guardarCliente'])->name('clientes.store');
Route::get('/clientes/{cliente}', [ClientesControl::class, 'mostrarDetalles'])->name('clientes.show');
Route::get('/clientes/{cliente}/editar', [ClientesControl::class, 'mostrarFormularioEdicion'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClientesControl::class, 'actualizarCliente'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [ClientesControl::class, 'eliminarCliente'])->name('clientes.destroy');
Route::post('/admin/logout', [AdministradoresControl::class, 'out'])->name('admin.logout');

// Después del login exitoso, redirige aquí
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');