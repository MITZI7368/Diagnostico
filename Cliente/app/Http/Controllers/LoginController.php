<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function mostrarLogin()
    {
        return view('auth.login');
    }

    protected function attemptLogin(Request $request)
    {
        return Auth::attempt([
            'email' => $request->email,
            'password' => $request->contraseña  
        ]);
    }

    public function login(Request $request)
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'contraseña' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $credenciales['email'],
            'password' => $credenciales['contraseña'],
            'estado' => 'activo'
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/productos');
        }

        // return back()->withErrors([
        //     'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        // ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}