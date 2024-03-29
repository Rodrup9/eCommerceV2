<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_user extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
}
