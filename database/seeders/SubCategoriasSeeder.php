<?php

namespace Database\Seeders;

use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategorias = [
            [
                'nombre' => 'Televisión',
                'categoria_id' => '7'
            ],
            [
                'nombre' => 'Audifonos',
                'categoria_id' => '7'
            ],
            [
                'nombre' => 'Camara fotografica',
                'categoria_id' => '7'
            ],
            [
                'nombre' => 'Bocinas',
                'categoria_id' => '7'
            ],
            [
                'nombre' => 'Laptops',
                'categoria_id' => '1'
            ],
            [
                'nombre' => 'Tablets',
                'categoria_id' => '1'
            ],
            [
                'nombre' => 'Computadoras de escritorio',
                'categoria_id' => '1'
            ],
            [
                'nombre' => 'Celulares',
                'categoria_id' => '1'
            ],
            [
                'nombre' => 'Decoración del hogar',
                'categoria_id' => '2'
            ],
            [
                'nombre' => 'Baño',
                'categoria_id' => '2'
            ],
            [
                'nombre' => 'Climatización y calefación',
                'categoria_id' => '2'
            ],
            [
                'nombre' => 'Iluminación',
                'categoria_id' => '2'
            ],
            [
                'nombre' => 'Jardin',
                'categoria_id' => '2'
            ],
            [
                'nombre' => 'Fútbol',
                'categoria_id' => '3'
            ],
            [
                'nombre' => 'Fitnes',
                'categoria_id' => '3'
            ],
            [
                'nombre' => 'Golf',
                'categoria_id' => '3'
            ],
            [
                'nombre' => 'Pesca',
                'categoria_id' => '3'
            ],
            [
                'nombre' => 'Box',
                'categoria_id' => '3'
            ],
            [
                'nombre' => 'Ropa',
                'categoria_id' => '6'
            ],
            [
                'nombre' => 'Zapatos',
                'categoria_id' => '6'
            ],
            [
                'nombre' => 'Accesorios',
                'categoria_id' => '6'
            ],
            [
                'nombre' => 'Libros',
                'categoria_id' => '5'
            ],
            [
                'nombre' => 'Musica',
                'categoria_id' => '5'
            ],
            [
                'nombre' => 'Pinturas',
                'categoria_id' => '5'
            ],
            [
                'nombre' => 'Cuadros',
                'categoria_id' => '5'
            ]
        ];
        foreach ($subCategorias as $item){
            Subcategoria::create($item);
        }
    }
}
