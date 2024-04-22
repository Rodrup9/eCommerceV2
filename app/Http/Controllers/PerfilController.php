<?php

namespace App\Http\Controllers;

use App\Http\Requests\Perfil;
use App\Http\Requests\StorePassword;
use App\Http\Requests\Vendedor;
use App\Models\Tienda;
use App\Models\Type_user;
use App\Models\User;
use Illuminate\Http\Request;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Image;


class PerfilController extends Controller
{
    public function perfil()
    {

        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }


        return view('sesion.perfil', [
            'nameView' => 'Perfil',
            'nombre' => $user->nombre,
            'apellido_pa' => $user->apellido_pa,
            'apellido_ma' => $user->apellido_ma,
            'correo' => $user->email,
            'username' => $user->nombre_de_usuario,
            'imag' => $img
        ]);
    }

    public function actualizar()
    {

        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }

        return view('sesion.actPerfil', [
            'nameView' => 'Actualizar Perfil',
            'nombre' => $user->nombre,
            'apellido_pa' => $user->apellido_pa,
            'apellido_ma' => $user->apellido_ma,
            'correo' => $user->email,
            'username' => $user->nombre_de_usuario,
            'imag' => $img
        ]);
    }

    public function confirmacion(Perfil $request)
    {

        $user = User::find(Auth::user()->id);
        $user->nombre_de_usuario = $request->username;
        $user->nombre = $request->nombre;
        $user->apellido_pa = $request->apellido_pa;
        $user->apellido_ma = $request->apellido_ma;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('perfil');
    }

    public function actualizarContraseña()
    {
        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }
        return view('sesion.actContraseña', [
            'nameView' => 'Cambia tu contraseña',
            'imag' => $img
        ]);
    }

    public function confirmacionContraseña(StorePassword $request)
    {
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request["password"]);
        $user->update();

        return redirect()->route('perfil');
    }

    public function vuelveteVen()
    {
        $user = Auth::user();
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }
        return view('sesion.vendedor', [
            'nameView' => 'Vuelvete vendedor',
            'imag' => $img
        ]);
    }

    public function convertir(Vendedor $request)
    {
        $tienda = new Tienda();
        $tienda->nombre = $request->tienda;
        $tienda->user_id = Auth::user()->id;
        $tienda->telefono = $request->telefono;
        $tienda->email = $request->correo;
        $tienda->descripcion = $request->descripcion;
        $tienda->direccion = $request->direccion;
        $tienda->save();

        $user = User::find(Auth::user()->id);

        $tipoUsuario = Type_user::find(2);

        $user->type_users()->attach($tipoUsuario);

        return redirect()->route('perfil');
    }

    public function agregarImg(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user != null) {
            $datos = User::findOr($user->id);
            $img = $datos->images;
        } else {
            $img = null;
        }

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

        if ($img == null) {
            if ($request->hasFile("imagen")) {
                $total_imagen = $request->file("imagen");
                foreach ($total_imagen as $img) {
                    $nombreImagen = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
                    $cloudinary = new UploadApi();
                    $resultado = $cloudinary->upload($img->getRealPath(), ["folder" => "Productos", "public_id" => $nombreImagen]);
                    $url = $resultado["secure_url"];
                    $public_id = $resultado["public_id"];
                    $imagen = new Image;
                    $imagen->url = $url;
                    $imagen->public_id = $public_id;
                    $user->images()->save($imagen);
                }
                return redirect()->route('perfil');
            }
        } else {
            $total_imagen = $request->file("imagen");
            foreach ($total_imagen as $imag) {
                $nombreImagen = pathinfo($imag->getClientOriginalName(), PATHINFO_FILENAME);
                $cloudinary = new UploadApi();
                $resultado = $cloudinary->upload($imag->getRealPath(), ["folder" => "Productos", "public_id" => $nombreImagen]);
                $url = $resultado["secure_url"];
                $public_id = $resultado["public_id"];

                $img->url = $url;
                $img->public_id = $public_id;
                $img->save();
            }
            return redirect()->route('perfil');
        }
    }
}
