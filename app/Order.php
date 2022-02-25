<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status-pay',
        'delivery_time',
    ];

    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
}
