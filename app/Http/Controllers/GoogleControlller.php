<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Type_user;

class GoogleControlller extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $partes_nombre = explode(" ", $user->name);

        
        $user = User::updateOrCreate([
            'google_id' => $user->id,
        ], [
            'nombre' => $user->name,
            'email' => $user->email,
            'apellido_pa' => $partes_nombre[2],
            'apellido_ma' => $partes_nombre[3],
        ]);

        

        $tipoUsuario = Type_user::where('nombre', '=', 'Cliente')->first();
        $user->type_users()->attach($tipoUsuario->id);

        Auth::login($user);

        return redirect()->route('home');
    }
}
