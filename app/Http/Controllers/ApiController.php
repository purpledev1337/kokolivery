<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Type;
use DB;

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

        $dishes = DB::table('dishes')
                -> select('*')
                -> where('user_id', $id)
                -> where('is_visible', 1)
                -> where('delete', 0)
                -> get();

        $restaurant = User::findOrFail($id);


        $data = [
            'dishes' => $dishes,
            'restaurant' => $restaurant
        ];
        return json_encode($data);
    }
}
