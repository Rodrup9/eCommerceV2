<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Type_user;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use App\Models\Image;

class GoogleControlller extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $url = $user->avatar;
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

        Configuration::instance([
            'cloud' => [
                'cloud_name' => 'dlxpr11ok',
                'api_key' => '684419351949932',
                'api_secret' => 'P2F1tpvLqz6681avsE0oxPQeBV0'
            ],
            'url' => [
                'secure' => true
            ]
        ]);

        $cloudinary = new UploadApi();
        $resultado = $cloudinary->upload($url, ["folder" => "Productos","public_id"=>$user->name]);
        $url = $resultado["secure_url"];
        $public_id = $resultado["public_id"];
        $imagen = new Image;
        $imagen->url = $url;
        $imagen->public_id = $public_id;
        $user->images()->save($imagen);

        Auth::login($user);

        return redirect()->route('home');
    }
}
