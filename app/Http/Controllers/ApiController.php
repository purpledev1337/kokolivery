<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Type;
use DB;

class ApiController extends Controller
{
    public function getRestaurants() {

        // $types = Type::all();
        $users = User::all();

        // $data = [
        //     'users' => $users,
        //     'types' => $types
        // ];
        
        return json_encode($users);
    }
    public function getCategotries() {

        $types = Type::all();
        // $types = User::all();
        // $data = [
        //     'users' => $users,
        //     'types' => $types
        // ];
        
        return json_encode($types);
    }
    public function categoriesByRestaurant($id){

        // ho id del risto devo andare nella tab pivot
        // e cercare tutti gli type_id che hanno user_id = id
        // SELECT *, (SELECT GROUP_CONCAT(tu.type_id) 
        //    FROM type_user AS tu
        //    WHERE u.id = tu.user_id) FROM `users` AS u WHERE 1
        // echo $id;


        $users = DB::table('type_user')
                     ->select(DB::raw('type_id'))
                     ->where('user_id', '=', $id)
                     ->get();

        $data = DB::table('type_user')
            ->join('types', 'type_id', '=', 'types.id')
            ->select('*')
            ->where('user_id', '=', $id)
            ->get();


        return json_encode($data);
    }

    
    public function restaurantDishesView($id) {
        $dishes = User::find($id) -> dishes;
        
        return json_encode($dishes);
    }
}
