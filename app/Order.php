<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status_pay',
        'delivery_time',
    ];

    public function dishes() {

        return $this->belongsToMany(Dish::class)->withPivot('quantity');
    }
    public function guest() {

        return $this -> hasOne(Guest::class);
    }
}
