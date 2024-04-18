<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Perfil;
use App\Http\Requests\StorePassword;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminEcommerceController extends Controller
{
    function index(){
        return view('moduloAdminEcommerce.homeAdminEcommerce', 
        [
            'nameView' => 'AdminEcomerce'
        ]);
    }

    public function lista($lista){
        
        $users = User::whereHas('type_users', function($query) use($lista){
            $query->where('nombre',$lista);
        })->get();
        return view('moduloAdminEcommerce.listaAdminEcommerce',
        [
            'nameView' => 'Lista',
            'typeList' => $lista,
            'usuarios' => $users,
        ]);
    }

    public function detalles($data){

        $user = User::find($data)->first();


        return view('moduloAdminEcommerce.detallesListAdminEcommerce',
        [
            'nameView' => 'Detalles',
            'nameDetalle' => $user
        ]);
    }

    public function perfil() {

        $user = Auth::user();

        return view('sesion.perfil', [
            'nameView' => 'Perfil',
            'nombre' => $user->nombre,
            'apellido_pa' => $user->apellido_pa,
            'apellido_ma' => $user->apellido_ma,
            'correo' => $user->email,
            'username' => $user->nombre_de_usuario
        ]);
    }

    public function actualizar() {

        $user = Auth::user();
        
        return view('sesion.actPerfil', [
            'nameView' => 'Actualizar Perfil',
            'nombre' => $user->nombre,
            'apellido_pa' => $user->apellido_pa,
            'apellido_ma' => $user->apellido_ma,
            'correo' => $user->email,
            'username' => $user->nombre_de_usuario
        ]);
    }

    public function confirmacion(Perfil $request) {

        $user = User::find(Auth::user()->id);
        $user->nombre_de_usuario = $request->username;
        $user->nombre = $request->nombre;
        $user->apellido_pa = $request->apellido_pa;
        $user->apellido_ma = $request->apellido_ma;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('perfil');
    }

    public function actualizarContraseña() {
        return view('sesion.actContraseña', [
            'nameView' => 'Cambia tu contraseña'
        ]);
    }

    public function confirmacionContraseña(StorePassword $request) {
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request["password"]);
        $user->update();

        return redirect()->route('perfil');
    }

    public function eliminarUser($user){
        $userElim = User::find($user);
        $userElim->delete();
        return redirect()->route('homeAdminEcommerce');
    }



    public function producVendedor(){
        // $users = User::whereHas('type_users', fn($query)=>$query->where('nombre','Vendedor'))->get();
        // $ProdVen = $users->productos();
        
        $users = User::with('productos')->get();
        $proven = $users->whereHas('type_users', fn($query)=>$query->where('nombre','Vendedor'))->get();
        // $users = User::all();
        // $users->productos()->whereHas();
        return view('moduloAdminEcommerce.productosVendedor',[
            'nameView' => 'Productos de vendedores',
            'productos' => $proven
        ]);
    }
}
