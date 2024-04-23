<?php

namespace App\Http\Controllers;

use App\Models\Calidad_producto;
use App\Models\Categoria;
use App\Models\Comentario;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Subcategoria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class VendedorController extends Controller
{
    public function pedidos(): View{
        $idVendedor= Auth::user();
        $pedidos = Pedido::withWhereHas(
                'detalle_de_pedido.productos',function($query) use($idVendedor){
                    $query->where('user_id', $idVendedor->id);
                })->with(['user','estado_pedido','detalle_de_pedido.productos.images'])->get();
        
        // $pedidos = Pedido::with(['user','ubicacion','estado_pedido','tipo_de_entrega','detalle_de_pedido.productos.user'=>function($query) use($idVendedor){
        //     $query->where('id', $idVendedor->id);
        // }])->get();
        

        return view("moduloVendedores.listaPedido",
        ['nameView' => 'Pedidos',
            'pedidos' => $pedidos
        ]);
    }

    
    public function index(): View{

    $user = Auth::user();


        return view("moduloVendedores.homeVendedor",
        [   'nameView' => 'Home'
        ]);
    }

    public function detallesPedido($pedido){


        $pedido = Pedido::with([
            'detalle_de_pedido.productos.images'
            ,'user','estado_pedido',
            'ubicacion',
            'tipo_de_entrega'
            ])->find($pedido);

        // $pedidos = Pedido::withWhereHas(
        //     'detalle_de_pedido.productos',function($query) use($idVendedor){
        //         $query->where('user_id', $idVendedor->id);
        //     })->with(['user','estado_pedido','detalle_de_pedido.productos.images'])->get();

        return view("moduloVendedores.detallesPedido",
        [
            'nameView' => 'detalles pedido',
            'pedido' => $pedido
        ]);
    }

    public function listaProductos(){
        $idUser = Auth::user();
        // $productos = Producto::withWhereHas('user',function($query) use($idUser){
        //     $query->where('id',$idUser);
        // })->get();
        // $productos = Producto::with(['user'=>function($query) use($idUser){
        //     $query->where('id' , $idUser->id);
        // }])->get();
        $productos = Producto::where('user_id',$idUser->id)->get();
        return view("moduloVendedores.listaProductos",
            ["productos" => $productos,
            "nameView"=> "lista produc"]);
    }

    public function detallesProducto($producto){
        $datosProducto = Producto::findOr($producto);
        $subCat = $datosProducto->Subcategoria;
        $imagesProducto = $datosProducto->images;
        $categorias =  Categoria::with("subcategorias")->get();
        return view("moduloVendedores.detallesProducto",
            ["Producto" => $datosProducto,
            "Imagenes" => $imagesProducto,
            "categorias" =>$categorias,
            "subcategoria" => $subCat,
            "nameView"=>"detalles produc"]);
    }

    public function reporteProducto(){
        return view("moduloVendedores.reporte",[
            'nameView'=> 'reporte vendedor',
        ]);
    }


    public function infoReporte(){
        // $masVendidos = Calidad_producto::select('producto_id','total_vendidas')->orderBy('total_vendidas','desc')->producto()->take(10);
        $masVend = Calidad_producto::select('calidad_producto_id','producto_id','total_vendidad')
            ->with(['productos' => fn ($query) => $query->select('producto_id','nombre','precio')])
            ->orderByDesc('total_compras')
            ->take(10);

        return response()->json($masVend);
    }

    public function comenProductos(){

        $idUser = Auth::user();

        $producCommt = Producto::where('user_id',$idUser->id)->withCount('comentarios')->get();

        // $producCommt = Producto::find(2)->comentarios()->count();
        return view('moduloVendedores.comentarios',
        [
            'nameView' => 'comentarios',
            'totalComn' => $producCommt
        ]);
    }

    public function TotalComentarios($producto){
        
        $comentarios = Producto::where('producto_id',$producto)->with(['comentarios'=>function($query){
            $query->with('user');
        }])->get();
        
        //esta forma tambien sirve pero mas corta
        // $comentarios = Producto::with('comentarios.user')->find($producto);

        //esta forma tambien sirve pero separa los usuarios en un array aparte
        // $comentarios = Producto::with(['comentarios','user'])->find($producto);


        // $producto = Producto::with(['comentarios' => function ($query) {
        //     $query->select('contenido', 'user_id'); // Selecciona solo el contenido del comentario y el ID del usuario
        //     $query->with('usuario:id,nombre'); // Carga los usuarios asociados a los comentarios y selecciona solo el nombre
        // }])->select('descripcion', 'precio')->find($id_del_producto);

        
        return view('moduloVendedores.detalleComentario',
        ['nameView'=> 'detalles comentarios',
        'comentarios'=> $comentarios
        ]);
    }

}
