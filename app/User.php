<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brande_name',
        'email',
        'password',
        'address',
        'city',
        'p_iva',
        'description',
        'image_path',
        'order_min',
        'delivery_price',
        'discount',
        'rating',
        'num_rating'
    ];

    public function types() {
        return $this -> belongsToMany(Type::class);
    }

    public function dishes(){
        return $this -> hasMany(Dish::class);
    }



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}
