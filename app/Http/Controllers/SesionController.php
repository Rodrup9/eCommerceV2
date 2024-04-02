<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComprobarCodigo;
use App\Http\Requests\StoreRegister;
use App\Http\Requests\Login;
use App\Http\Requests\StoreCode;
use App\Http\Requests\StorePassword;
use App\Mail\Recuperacion;
use App\Models\Password_reset_token;
use App\Models\Type_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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

        $tipoUsuario = Type_user::where('nombre', '=', 'Cliente')->first();
        
        $user->type_users()->attach($tipoUsuario->id);
        
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

        $passwordReset = Password_reset_token::where('email','=',$request->email)->first();

        if ($passwordReset) {
            if ($passwordReset->used || $passwordReset->created_at->addHours(1)->isPast()) {
                $passwordReset->delete();
            } else {
                return redirect()->back()->withErrors(['error' => 'Ya existe un código asociado a este correo.']);
            }
        }

        $correo = $request->email;
        $token = Str::random(6);
        
        DB::table('password_reset_tokens')->insert([
            'email' => $correo,
            'token' => $token,
            'used' => false,
            'created_at' => now(),
        ]);

        Mail::to($correo)->send(new Recuperacion($token));

        return redirect()->route('verificacion');
    }

    public function verificacion() {
        return view('sesion.verificacion', ['nameView' => 'Verificación de código']);
    }

    public function reestablecer(ComprobarCodigo $request) {

        $email = Password_reset_token::where('token',$request->code)->first();
        $passwordReset = Password_reset_token::where('email',$email->email)->first();

        if ($passwordReset && ($passwordReset->used || $passwordReset->created_at->addHours(1)->isPast())) {
            return redirect()->route('verificacion')->withErrors(['error' => 'El código de recuperación ya fue usado o ha excedido el tiempo de espera.']);
        }

        return view('sesion.reestablecer', [
            'nameView' => 'Reestablecer contraseña',
            'correo' => $passwordReset->email
        ]);
    
    }

    public function reestableciendo(StorePassword $storePassword) {
        $user = User::where('email','=',$storePassword->email)->first();
        $user->password = Hash::make($storePassword->password);
        $user->update();

        $token = Password_reset_token::where('email','=',$storePassword->email)->first();
        $token->delete();

        return redirect()->route('login');
    }
}
