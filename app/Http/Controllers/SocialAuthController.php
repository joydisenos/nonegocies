<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Socialite;

class SocialAuthController extends Controller
{
    // Metodo encargado de la redireccion a Facebook
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
        // Obtenemos los datos del usuario
        $social_user = Socialite::driver($provider)->user(); 
        $nombres = explode(' ' , $social_user->name);
        // Comprobamos si el usuario ya existe
        if ($user = User::where('email', $social_user->email)->first()) { 
            return $this->authAndRedirect($user); // Login y redirección
        } else {  
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            $user = User::create([
                'name' => $nombres[0], 
                'apellido' => $nombres[1], 
                'email' => $social_user->email,
            ]);
 
            return $this->authAndRedirect($user); // Login y redirección
        }
    }
 
    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);
 
        return redirect()->to('/ofertas');
    }
}
