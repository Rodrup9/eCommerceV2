<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;



    protected $primaryKey = 'producto_id';

    //many-to-one
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    //one-to-many polimórfica
    public function images() {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function subcategoria(){
        return $this->belongsTo(Subcategoria::class,"subcategoria_id");
    }
}
