<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Type;
use DB;

class ApiController extends Controller
{
    public function getAllCity() {

        $data = DB::table('users')
                    ->select('city')
                    ->distinct()
                    ->get();        
        return json_encode($data);
    }

    public function getRestaurantsWithDetails($field = null) {

        if ($field == null)
            $users = User::all();
        
        else
            $users = DB::table('users')
                        ->select('*')
                        ->where('city', 'like', "%$field%")
                        ->get();


        for ($i = 0; $i < count($users); $i++){
            $data = DB::table('type_user')
                    ->join('types', 'type_id', '=', 'types.id')
                    ->select('*')
                    ->where('user_id', '=', $users[$i]['id'])
                    ->get();
            (count($data) > 0) ? $users[$i]['categories'] = $data : $users[$i]['categories'] = null;   
        }            
        
        
        return json_encode($users);
    }

    public function getCategotries() {

        $types = Type::all();
        
        return json_encode($types);
    }
    // public function categoriesByRestaurant($id){

    //     // ho id del risto devo andare nella tab pivot
    //     // e cercare tutti gli type_id che hanno user_id = id
    //     // SELECT *, (SELECT GROUP_CONCAT(tu.type_id) 
    //     //    FROM type_user AS tu
    //     //    WHERE u.id = tu.user_id) FROM `users` AS u WHERE 1
    //     // echo $id;


    //     $users = DB::table('type_user')
    //                  ->select(DB::raw('type_id'))
    //                  ->where('user_id', '=', $id)
    //                  ->get();

    //     $data = DB::table('type_user')
    //         ->join('types', 'type_id', '=', 'types.id')
    //         ->select('*')
    //         ->where('user_id', '=', $id)
    //         ->get();


    //     return json_encode($data);
    // }

    
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
