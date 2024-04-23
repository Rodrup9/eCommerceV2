<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Producto;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary\Configuration\Configuration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producto = new Producto;
        $producto->nombre = 'Gorra color verde mediana';
        $producto->descripcion = 'Esta elegante gorra verde combina estilo y comodidad en un diseño moderno y versátil. Está confeccionada con materiales de alta calidad para ofrecer durabilidad y un ajuste cómodo.

        Características principales:
        
        Color: Verde vibrante que resalta y complementa cualquier atuendo.
        Diseño: Estilo clásico de gorra de béisbol con una visera curva que proporciona protección solar adicional.
        Material: Hecha de tela resistente y transpirable que permite una ventilación óptima.
        Ajuste: Cierre ajustable en la parte posterior para adaptarse a diferentes tamaños de cabeza.
        Versatilidad: Perfecta para uso diario, deportes al aire libre, o simplemente como un accesorio de moda.';
        $producto->cantidad = 275;
        $producto->direccion = '123 Calle Principal, Ciudad de Ejemplolandia, Estado de Imaginación, País de la Creatividad, 12345';
        $producto->tipo_envio = 'ambos';
        $producto->subcategoria_id = 4;
        $producto->user_id = 1;
        $producto->precio = 300;
        $producto->oferta = false;
        $producto->precio_ante = null;
        $producto->fecha_lim_desc = null;
        $producto->save();
        
        $imagen = new Image;
        $imagen->url = 'https://res.cloudinary.com/dlxpr11ok/image/upload/v1712946152/Productos/gorra3.jpg';        
        $imagen->public_id = 'Productos/gorra3';
        $producto->images()->save($imagen);
    }
}