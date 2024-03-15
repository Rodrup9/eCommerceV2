<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function type_users(){
        return $this->belongsToMany('App\Models\Type_user');
    }

    //one-to-many
    public function user() {
        return $this->hasMany('App\Models\Producto');
    }

    //Relación many-to-many
    public function categorias() {
        return $this->belongsToMany('App\Models\Categoria');
    }

    //one-to-many polimórfica
    public function images() {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
