<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'address',
        'email',
        'order_id'
    ];

    public function order() {

        return $this->belongsTo(Guest::class);
    }
}
