<?php

namespace Database\Seeders;

use App\Models\Type_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeUserSeefer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeUserData = [
            ['nombre' => 'Cliente'], 
            ['nombre' => 'Vendedor'], 
            ['nombre' => 'Administrador']
        ];

        foreach ($typeUserData as $data) {
            Type_user::create($data);
        }
        
    }
}
