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
                'nombreSubCategoria' => 'Televisión',
                'categoria_id' => '7'
            ],
            [
                'nombreSubCategoria' => 'Audifonos',
                'categoria_id' => '7'
            ],
            [
                'nombreSubCategoria' => 'Camara fotografica',
                'categoria_id' => '7'
            ],
            [
                'nombreSubCategoria' => 'Bocinas',
                'categoria_id' => '7'
            ],
            [
                'nombreSubCategoria' => 'Laptops',
                'categoria_id' => '1'
            ],
            [
                'nombreSubCategoria' => 'Tablets',
                'categoria_id' => '1'
            ],
            [
                'nombreSubCategoria' => 'Computadoras de escritorio',
                'categoria_id' => '1'
            ],
            [
                'nombreSubCategoria' => 'Celulares',
                'categoria_id' => '1'
            ],
            [
                'nombreSubCategoria' => 'Decoración del hogar',
                'categoria_id' => '2'
            ],
            [
                'nombreSubCategoria' => 'Baño',
                'categoria_id' => '2'
            ],
            [
                'nombreSubCategoria' => 'Climatización y calefación',
                'categoria_id' => '2'
            ],
            [
                'nombreSubCategoria' => 'Iluminación',
                'categoria_id' => '2'
            ],
            [
                'nombreSubCategoria' => 'Jardin',
                'categoria_id' => '2'
            ],
            [
                'nombreSubCategoria' => 'Fútbol',
                'categoria_id' => '3'
            ],
            [
                'nombreSubCategoria' => 'Fitnes',
                'categoria_id' => '3'
            ],
            [
                'nombreSubCategoria' => 'Golf',
                'categoria_id' => '3'
            ],
            [
                'nombreSubCategoria' => 'Pesca',
                'categoria_id' => '3'
            ],
            [
                'nombreSubCategoria' => 'Box',
                'categoria_id' => '3'
            ],
            [
                'nombreSubCategoria' => 'Ropa',
                'categoria_id' => '6'
            ],
            [
                'nombreSubCategoria' => 'Zapatos',
                'categoria_id' => '6'
            ],
            [
                'nombreSubCategoria' => 'Accesorios',
                'categoria_id' => '6'
            ],
            [
                'nombreSubCategoria' => 'Libros',
                'categoria_id' => '5'
            ],
            [
                'nombreSubCategoria' => 'Musica',
                'categoria_id' => '5'
            ],
            [
                'nombreSubCategoria' => 'Pinturas',
                'categoria_id' => '5'
            ],
            [
                'nombreSubCategoria' => 'Cuadros',
                'categoria_id' => '5'
            ]
        ];
        foreach ($subCategorias as $item){
            Subcategoria::create($item);
        }
    }
}
