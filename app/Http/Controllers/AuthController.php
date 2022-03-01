<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use Illuminate\Support\Facades\Auth;

use App\User;

class AuthController extends Controller
{
    // view form create piatto
    public function dishCreate() {

        return view('pages.dishCreate');

    }

    // creazione e salvataggio piatto
    public function dishStore(Request $Request) {

        $data = $Request -> validate([

            'name' => 'required|string',
            'description' => 'required|string',
            'image_path' => 'image|mimes:jpeg,png,jpg|max:10240',
            'price' => 'required|numeric',
            'category' => 'required|string',
        ]);

        // prendo l'img dal form
        $imageFile = $Request -> file('image_path');

        // assegno un nome univoco all'img
        $imageName = rand(100000,999999) . '_' . time() . '.' . $imageFile -> getClientOriginalName();

        // salvo l'img nello storage
        $imageFile -> storeAs('/storage/', $imageName , 'public');

        // aggiungo l'img all'array che salvero' nel db
        $data['image_path'] = $imageName;
        
        $dish = Dish::make($data);
        $dish -> user() -> associate(Auth::user() -> id);
        $dish -> save();

        return redirect() -> route('myDishes');
    }
    
    // View del form edit
    public function dishEdit($id){

        $dish = Dish::findOrFail($id);
        return view('pages.dishEdit', compact('dish'));

    }

    // Aggiornamento del piatto
    public function dishUpdate(Request $Request, $id){

        $data = $Request -> validate([

            'name' => 'required|string',
            'description' => 'required|string',
            'image_path' => 'image|mimes:jpeg,png,jpg|max:10240',
            'price' => 'required|numeric',
            'category' => 'required|string',
        ]);

        
        // prendo l'img dal form
        $imageFile = $Request -> file('image_path');
        // se nel form l'utente propone una nuova image
        if($imageFile){
            // assegno un nome univoco all'img
            $imageName = rand(100000,999999) . '_' . time() . '.' . $imageFile -> getClientOriginalName();
            // salvo l'img nello storage
            $imageFile -> storeAs('/storage/', $imageName , 'public');
            // aggiungo l'img all'array che salvero' nel db
            $data['image_path'] = $imageName;
        }

        $dish = Dish::findOrFail($id);
        $dish -> update($data);

        return redirect() -> route('myDishes');
    }

    // visibilita' piatto
    public function dishVisibility($id){

        $dish = Dish::findOrFail($id);
        // se il piatto e' invisibile
        if(!$dish -> is_visible){
            // imposto visible a true per far sparire in page il piatto(all'utente)
            $dish -> is_visible = 1;
        } else{
            // imposto visible a false per far sparire in page il piatto(all'utente)
            $dish -> is_visible = 0;
        }
        $dish -> save();
        return redirect() -> route('myDishes');
    }

    // eliminazione del piatto
    public function dishDelete($id) {

        $dish = Dish::findOrFail($id);
        // imposto delete a true per cancellare in page il piatto(mi resta in database)
        $dish -> delete = 1;
        $dish -> save();
        return redirect() -> route('myDishes');

    } 
    
    // eliminazione del ristorante
    public function restaurantDelete(){
        $restaurant = User::findOrFail(Auth::user()->id);
        $restaurant -> types() -> detach();
        $restaurant -> save();
        
        $restaurant = User::findOrFail(Auth::user()->id);
        $restaurant -> dishes() -> delete();

        $restaurant -> delete();

        return redirect() -> route('home');
        
    }
}