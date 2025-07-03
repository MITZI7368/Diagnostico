<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrador; 

class AdministradoresControl extends Controller
{
    public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'usuario' => ['required'],
        'password' => ['required'],
    ]);

    // Verificamos si el usuario existe
    $admin = Administrador::where('usuario', $request->usuario)
        ->where('estado', 'activo')
        ->first();

    if (!$admin) {
        return back()->withErrors(['usuario' => 'Usuario no encontrado o inactivo.'])->withInput();
    }

    // Verificamos si la contraseña es correcta
    if (!Hash::check($request->password, $admin->password)) {
        return back()->withErrors(['password' => 'Contraseña incorrecta.'])->withInput();
    }

    if (Auth::guard('admin')->attempt(['usuario' => $request->usuario, 'password' => $request->password])) {
        $request->session()->regenerate();
        // Guardar la información del administrador en la sesión
        if ($admin) {
            $request->session()->put('admin', $admin);
            return redirect('/admin/dashboard'); // Nueva ruta
        }
        
        return back()->withErrors(['usuario' => 'Credenciales incorrectas']);
    }
    return back()->withErrors(['usuario' => 'Error en la autenticación.'])->withInput();
}
    public function out(Request $request)
{
    $request->session()->forget('admin');
    return redirect('/');
}

}