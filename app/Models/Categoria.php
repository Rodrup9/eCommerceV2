<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //Relación many-to-many
    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
