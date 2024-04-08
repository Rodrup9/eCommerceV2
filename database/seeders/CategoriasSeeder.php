<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Tecnologia'],
            ['nombre' => 'Hogar y mueble'],
            ['nombre' => 'Deporte'],
            ['nombre' => 'Electrodomesticos'],
            ['nombre' => 'Arte'],
            ['nombre' => 'Moda'],
            ['nombre' => 'Electronica,Audio y video']
        ];
        foreach ($categorias as $item){
            Categoria::create($item);
        }
    }
}
