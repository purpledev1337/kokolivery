<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller
{
    public function restaurantDelete($id)
    {
        // dd($id);
        $restaurant = User::findOrFail($id);
        dd($restaurant -> dishes());
        // $restaurant -> save();

        $restaurant -> types() -> detach($types -> id);
        $restaurant -> save();

        $restaurant -> delete();
        return redirect() -> route('home');
        
    }
}
