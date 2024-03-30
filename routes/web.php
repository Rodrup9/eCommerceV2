<?php


use Illuminate\Http\Request;

use App\Http\Controllers\AdminEcommerceController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\DetallesController;
use App\Http\Controllers\VendedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\ShoppingCartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});*/

//Rutas para el manejo de las sesiones
Route::controller(SesionController::class)->group(function() {
    Route::get('login', 'index')->name('login')->middleware('guest');
    Route::post('login', 'login')->name('signin')->middleware('guest');
    Route::get('register', 'register')->name('register')->middleware('guest');
    Route::post('registro', 'check')->name('confirmar')->middleware('guest');
    Route::post('logOut', 'logOut')->name('logOut');
    Route::get('recuperacionDeCuenta', 'recuperacion')->name('recuperar')->middleware('guest');
    Route::get('sendCode', 'code')->name('sendCode')->middleware('guest');
    Route::get('verificacionDeCodigo', 'verificacion')->name('verificacion')->middleware('guest');
    Route::get('reestablecerContraseña', 'reestablecer')->name('reestablecer')->middleware('guest');
});


Route::controller(HomeController::class)->group(function(){
    Route::get('/home', 'index')->name('home');
    Route::get('/', 'index')->name('home');
});

Route::controller(CatalogoController::class)->group(function(){
    Route::get('/catalogo/{id?}/{filter?}', 'index')->name('catalogo');
});


Route::controller(ProductoController::class)->group(function(){
    Route::get("/vendedor/producto","NuevoProducto")->name("vendedor.producto");
    Route::post("/vendedor/producto","AgregarProducto")->name("vendedor.agg.producto");
    Route::get("/vendedor/producto/{producto}/delete","EliminarProductos")->name("vendedor.delete.producto");
    Route::put("/vendedor/producto/{producto}/update","ActualizarProducto")->name("vendor.producto.actualizar");
});

Route::controller(VendedorController::class)->group(function(){
    Route::get("/vendedor/pedidos","pedidos")->name("vendedor.pedidos");
    Route::get("/vendedor/pedidos/detalles","detalles")->name("vendedor.pedidos.detalles");
    Route::get("/vendedor","index")->name("vendedor");
    Route::get("/vendedor/lista/productos","listaProductos")->name("vendedor.lista.productos");
    Route::get("/vendedor/producto/{producto}","detallesProducto")->name("vendedor.producto.detalle");
    
});

Route::controller(ShoppingCartController::class)->group(function(){
    Route::get('/shoppingCart', 'index')->name('homeShoppingCart');
    Route::get('/shoppingCart/confirmar', 'confirmData')->name('confirmData');
    Route::get('/shoppingCart/Historial', 'historialShopping')->name('historialShopping');
});


Route::controller(AdminEcommerceController::class)->group(function(){
    Route::get('/adminEcommerce', 'index')->name('homeAdminEcommerce');
    Route::get('/adminListaEcommerce/{lista?}', 'lista')->name('adminListaEcommerce');
    Route::get('/adminListaEcommerce/{lista?}/{data?}', 'detalles')->name('adminListDetalles');
    Route::get('/perfil', 'perfil')->name('perfil');
});


Route::controller(DetallesController::class)->group(function(){
    Route::get("/detalles/{id?}/{producto?}","index")->name('detalles');
});



