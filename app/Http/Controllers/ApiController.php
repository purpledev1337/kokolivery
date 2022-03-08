<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Type;

class ApiController extends Controller
{
    public function getRestaurants() {

        $types = Type::all();
        $users = User::all();

        $data = [
            'users' => $users,
            'types' => $types
        ];
        
        return json_encode($data);
    }

    
    public function restaurantDishesView($id) {
        $dishes = User::find($id) -> dishes;
        
        return json_encode($dishes);
    }
}
