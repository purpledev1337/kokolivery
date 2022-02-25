<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ApiController extends Controller
{
    public function getRestaurants() {

        $users = User::all();

        dd("ciao");
        
        return json_encode($users);
    }
}
