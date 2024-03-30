<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    use HasFactory;

    protected $primaryKey = 'categoria_id';

    public function subcategorias(){
        return $this->hasMany(Subcategoria::class,'categoria_id');
    }

    // public function productos(){
    //     return $this->hasManyThrough(Producto::class,Subcategoria::class,'subcategoria_id','categoria_id');
    // }
    
}
