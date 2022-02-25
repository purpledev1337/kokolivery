<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status-pay',
        'delivery_time',
    ];

    public function guest() {

        return $this -> hasOne(Guest::class);
    }
}
