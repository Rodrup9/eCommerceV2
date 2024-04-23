<?php

namespace Database\Seeders;

use App\Models\Type_user;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->nombre = 'Canelita';
        $user->apellido_pa = 'De Chocolate';
        $user->apellido_ma = 'Ramirez';
        $user->email = 'rayadecanela@gmail.com';
        $user->nombre_de_usuario = 'canelita07';
        $user->password = Hash::make('12345678');
        $user->save();
        $tipoUsuario = Type_user::where('nombre', '=', 'Cliente')->first();
        $user->type_users()->attach(1);
    }
}
