<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    //many-to-one
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    //one-to-many polimórfica
    public function images() {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
