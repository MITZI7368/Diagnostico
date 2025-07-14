<?php


use App\Http\Controllers\ProductoControl;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\PedidoController as ControllersPedidoController;
use App\Models\Pedido;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ResenaController;

Route::get('/', function () {
    return redirect()->route('dashboard.index');
});
// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->name('dashboard.index');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/dashboard', function () {

    return view('dashboard.index');
})->name('dashboard.index');

Route::get('/login', [LoginController::class, 'mostrarLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.autenticar');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Vistas estáticas
Route::view('/plantilla', 'base.plantilla');

Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

// Catálogo (CLIENTES)
Route::get('/admin/productos', [ProductoControl::class, 'listaradmin'])->name('admin.productos');
Route::get('/producto/{id}', [ProductoControl::class, 'detalle'])->name('producto.detalle');


// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'carrito'])->name('carrito.carrito');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');


// Rutas de registro
Route::get('/registro', [RegistroController::class, 'mostrarFormulario'])->name('registro');
Route::post('/registro', [RegistroController::class, 'registrar'])->name('registro.guardar');

Route::get('/contacto', function () {return view('contacto.contacto');})->name('contacto');

Route::get('/nosotros', function () {return view('contacto.nosotros');})->name('nosotros');

// Rutas de pedido

Route::get('/pedidos/crear', [PedidoController::class, 'crear'])->name('pedidos.crear');
Route::post('/paypal/checkout', [PaypalController::class, 'checkout'])->name('paypal.checkout');
Route::get('/paypal/success', [PaypalController::class, 'success'])->name('paypal.success');
Route::get('/paypal/cancel', [PaypalController::class, 'cancel'])->name('paypal.cancel');

Route::get('/catalogo/{categoria?}', [App\Http\Controllers\CatalogoController::class, 'listado'])->name('catalogo.listado');



Route::get('/test-ssl', function() {
    try {
        $client = new \GuzzleHttp\Client([
            'verify' => 'C:\\laragon\\ssl\\cacert.pem',
            'curl' => [
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_SSL_VERIFYHOST => 2
            ]
        ]);
        
        $response = $client->get('https://api.sandbox.paypal.com');
        return "Conexión SSL exitosa!";
    } catch (\Exception $e) {
        return "Error SSL: " . $e->getMessage();
    }
});
 
Route::post('/resenas', [ResenaController::class, 'store'])->middleware('auth');
Route::delete('/resenas/{id}', [ResenaController::class, 'destroy'])->name('resenas.destroy')->middleware('auth');