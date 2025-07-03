<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use GuzzleHttp\Client;
use Exception;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->scopes(['openid', 'profile', 'email'])
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
    Socialite::driver('google')->setHttpClient(new Client([
        'verify' => 'C:\\laragon\\bin\\php\\php-8.3.14-Win32-vs16-x64\\extras\\ssl\\cacert.pem'
    ]));

    $googleUser = Socialite::driver('google')->stateless()->user();

    // ... resto del código


            // Obtener usuario sin validación de state (para evitar errores locales)
            $googleUser = Socialite::driver('google')->stateless()->user();

            if (!$googleUser || !$googleUser->getEmail()) {
                return redirect()->route('login')->with('error', 'No se recibieron datos válidos desde Google.');
            }

            // Buscar o crear usuario en base de datos
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make('password_temporal_segura'),
                    'google_id' => $googleUser->getId(),
                    'estado' => 'activo'
                ]);
            }

            // Forzar inicio de sesión y regenerar sesión para evitar bucles
            Auth::guard('web')->login($user, true);
            request()->session()->regenerate();

            return redirect()->route('dashboard.index');
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Error al iniciar sesión con Google: ' . $e->getMessage());
        }
    }
}
