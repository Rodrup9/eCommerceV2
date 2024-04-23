<?php


use App\Http\Controllers\PerfilController;
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
    Route::post('reestablecerContraseña', 'reestableciendo')->name('reestablecerPass')->middleware('guest');
});


Route::controller(HomeController::class)->group(function(){
    Route::get('/home', 'index')->name('home');
    Route::get('/', 'index')->name('home');
    Route::get('/homeUpdate/recientes', 'updateSlidersRecientes');
});

Route::group(['prefix' => 'catalogo'], function () {
    Route::get('', [CatalogoController::class, 'index'])->name('catalogo');
    Route::get('/search', [CatalogoController::class, 'search'])->name('search');
    Route::get('/searchCategoria/{id}', [CatalogoController::class, 'searchCategoria'])->name('searchCategoria');
});


Route::controller(ProductoController::class)->group(function(){
    Route::get("/vendedor/producto","NuevoProducto")->name("vendedor.producto")->middleware('ven');
    Route::post("/vendedor/producto","AgregarProducto")->name("vendedor.agg.producto")->middleware('ven');
    Route::get("/vendedor/producto/{producto}/delete","EliminarProductos")->name("vendedor.delete.producto")->middleware('ven');
    Route::put("/vendedor/producto/{producto}/update","ActualizarProducto")->name("vendor.producto.actualizar")->middleware('ven');
});

Route::controller(VendedorController::class)->group(function(){
    Route::get("/vendedor/pedidos","pedidos")->name("vendedor.pedidos")->middleware('ven');
    Route::get("/vendedor/pedidos/detalles/{pedido}","detallesPedido")->name("vendedor.pedidos.detalles")->middleware('ven');
    Route::get("/vendedor","index")->name("vendedor")->middleware('ven');
    Route::get("/vendedor/lista/productos","listaProductos")->name("vendedor.lista.productos")->middleware('ven');
    Route::get("/vendedor/producto/{producto}","detallesProducto")->name("vendedor.producto.detalle")->middleware('ven');
    Route::get('/vendedor/reporte','reporteProducto')->name('vendedor.reporte')->middleware('ven');
    Route::get('/vendedor/reporte/json','infoReporte')->name('vendedor.reporte.json')->middleware('ven');
    Route::get('/vendedor/comentarios','comenProductos')->name('vendedor.comentarios')->middleware('ven');
    Route::get('/vendedor/comentarios/{producto}','TotalComentarios')->name('vendedor.comentarios.count')->middleware('ven');
    
});
Route::controller(ShoppingCartController::class)->group(function(){
    Route::get('/shoppingCart', 'index')->name('homeShoppingCart');
    Route::post('/shoppingCart/confirmar', 'confirmData')->name('confirmData');
    Route::post('/shoppingCart/pay', 'pay')->name('pay');
    Route::get('/shoppingCart/Historial', 'historialShopping')->name('historialShopping');
});


Route::controller(AdminEcommerceController::class)->group(function(){
    Route::get('/adminEcommerce', 'index')->name('homeAdminEcommerce')->middleware('admin');
    Route::get('/adminListaEcommerce/{lista?}', 'lista')->name('adminListaEcommerce')->middleware('admin');
    Route::get('/adminListaEcommerce/detalles/{data?}', 'detalles')->name('adminListDetalles')->middleware('admin');
    Route::delete('/adminListaEcommerce/detalles/user/{user}','eliminarUser')->name('deleteUser')->middleware('admin');
    Route::get('/adminEcommerce/prodVend','producVendedor')->name('adminEcommerce.productos.vendedor')->middleware('admin');
    Route::get('/adminEcommerce/prodvend/{producto}','detallesProdVen')->name('adminEcommerce.productos.vendedor.detalles')->middleware('admin');
});


Route::controller(DetallesController::class)->group(function(){
    Route::get("/detalles/{id?}/{producto?}","index")->name('detalles');
    Route::get("/actualizarDatos/{id?}","updateComentarios")->name('updateComentarios');
    Route::post("/addComentarioUser","addComentarioUser")->name('addComentarioUser');
});


Route::controller(PerfilController::class)->group(function(){
    Route::get('/perfil', 'perfil')->name('perfil')->middleware('auth');
    Route::get('/actualizarPerfil','actualizar')->name('actPerfil')->middleware('auth');
    Route::put('/actConfirmacion','confirmacion')->name('actConfirmacion')->middleware('auth');
    Route::get('/actualizarContraseña', 'actualizarContraseña')->name('actContraseña')->middleware('auth');
    Route::put('/confirmContraseña', 'confirmacionContraseña')->name('confirmContraseña')->middleware('auth');
    Route::get('/vuelveteVendedor', 'vuelveteVen')->name('vuelVen')->middleware('auth');
    Route::post('/vuelveteVendedor', 'convertir')->name('convencion')->middleware('auth');
});
