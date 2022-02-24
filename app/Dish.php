<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{

    protected $fillable = [

        'name',
        'description',
        'image_path',
        'price',
        'category',
        'is_visible'
    ];
}
