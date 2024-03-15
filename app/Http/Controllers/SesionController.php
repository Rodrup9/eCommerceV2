<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegister;
use App\Mail\Recuperacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SesionController extends Controller
{
    public function index() {
        return view('sesion.login', ['nameView' => 'Login']);
    }

    public function login() {
        return redirect()->route('home');
    }

    public function register() {
        return view('sesion.register', ['nameView' => 'Register']);
    }

    public function check(StoreRegister $request) {
        $user = new User();
        $user->nombre = $request->name;
        $user->apellido_pa = $request->apellido_pa;
        $user->apellido_ma = $request->apellido_ma;
        $user->correo = $request->email;
        $user->nombre_de_usuario = $request->username;
        $user->contraseña = $request->password;

        $user->save();

        return redirect()->route('login');
    }

    public function recuperacion() {
        return view('sesion.recuperar', ['nameView' => 'Recuperación de cuenta']);
    }

    public function code(Request $request) {
        $correo = $request->email;

        Mail::to($correo)->send(new Recuperacion);

        return redirect()->route('verificacion');
    }

    public function verificacion() {
        return view('sesion.verificacion', ['nameView' => 'Verificación de código']);
    }

    public function reestablecer() {
        return view('sesion.reestablecer', ['nameView' => 'Reestablecer contraseña']);
    }
}
