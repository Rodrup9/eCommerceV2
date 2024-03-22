<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegister;
use App\Http\Requests\Login;
use App\Http\Requests\StoreCode;
use App\Mail\Recuperacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SesionController extends Controller
{
    public function index() {
        return view('sesion.login', ['nameView' => 'Login']);
    }


    public function login(Login $request) {
        $credentials = $request->only('email', 'password');
        $remenber = $request->filled('remenber');

        if (Auth::attempt($credentials, $remenber)) {
            request()->session()->regenerate();

            return redirect()->route('home');
        }

        throw ValidationException::withMessages([
            'email' => 'Usuario o contraseña incorrecta'
        ]);

        // return redirect()->route('login');
    }

    public function register() {
        return view('sesion.register', ['nameView' => 'Register']);
    }

    public function check(StoreRegister $request) {
        $user = new User();
        $user->nombre = $request->name;
        $user->apellido_pa = $request->apellido_pa;
        $user->apellido_ma = $request->apellido_ma;
        $user->email = $request->email;
        $user->nombre_de_usuario = $request->username;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('login');
    }

    public function logOut(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function recuperacion() {
        return view('sesion.recuperar', ['nameView' => 'Recuperación de cuenta']);
    }

    public function code(StoreCode $request) {
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
