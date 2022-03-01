<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use Illuminate\Support\Facades\Auth;

use App\User;

class AuthController extends Controller
{
    public function dishCreate() {

        return view('pages.dishCreate');
    }

    public function dishStore(Request $Request) {

        $data = $Request -> validate([

            'name' => 'required|string',
            'description' => 'required|string',
            'image_path' => 'image|mimes:jpeg,png,jpg|max:10240',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'is_visible' => 'required|boolean'
        ]);

        
        // prendo l'img dal form
        $imageFile = $Request -> file('image_path');
        
        // assegno un nome univoco all'img
        $imageName = rand(100000,999999) . '_' . time() . '.' . $imageFile -> getClientOriginalName();
        // salvo l'img nello storage
        $imageFile -> storeAs('/storage/', $imageName , 'public');
        // aggiungo l'img all'array che salvero' nel db
        $data['image_path'] = $imageName;
        
        // $data['user_id'] = Auth::user() -> id;
        
        $dish = Dish::make($data);
        $dish -> user() -> associate(Auth::user() -> id);
        $dish -> save();
        // dd($data);

        return redirect() -> route('myDishes');
    }

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