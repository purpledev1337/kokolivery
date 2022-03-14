<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\Type;
use App\Order;
use App\Chart;
use DB;

use Illuminate\Support\Facades\Auth;

use App\User;

class AuthController extends Controller
{

    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function myDishes()
    {
        // $dishes = User::find(Auth::User() -> id) -> dishes;

        $dishes = DB::table('dishes')
        -> select('*')
        -> where('user_id', Auth::User() -> id)
        -> where('delete', 0)
        -> get();

        $categories = [];

        foreach ($dishes as $dish) {
            if (!in_array($dish -> category, $categories)) {

                $categories[] = $dish -> category;
            }

        }

        return view('pages.my_dishes', compact('dishes', 'categories'));
    }

    public function myOrders()
    {
        $listOrder = DB::table('orders')
                        ->join('dish_order', 'orders.id','=', 'dish_order.order_id')
                        ->join('dishes', 'dish_order.dish_id','=', 'dishes.id')
                        ->join('users','dishes.user_id', 'users.id') 
                        ->where('users.id', Auth::User() -> id)
                        ->select('orders.id', 'order_price', DB::raw('COUNT(orders.id) as group_order'))
                        ->groupBy('orders.id')
                        ->orderBy('orders.id', 'DESC')->get();

        $listOrderComplete = [];

        foreach ($listOrder as $order) {
            $dishes = Order::find($order -> id) -> dishes;

            $data = [
                'id' => $order -> id,
                'order_price' => $order -> order_price,
                'dishes' => $dishes
            ];

            $listOrderComplete[] = $data;
        }
        
        return view('pages.my_orders', compact('listOrderComplete'));
    }
    
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
            'category' => 'required_with_all',
        ]);

        if($Request -> file('image_path')){
            // prendo l'img dal form
            $imageFile = $data['image_path'];
            // assegno un nome univoco all'img
            $imageName = rand(100000,999999) . '_' . time() . '.' . $imageFile -> getClientOriginalName();
            // salvo l'img nello storage
            $imageFile -> storeAs('/asset/', $imageName , 'public');
            // aggiungo l'img all'array che salvero' nel db
            $data['image_path'] = $imageName;
        } else {
            $data['image_path'] = 'asset/dish.jpg';
        } 
        
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
    public function dishDelete(Request $request) {
        $data = $request -> validate([
            'pass_id' => 'required|numeric|min:0'
        ]);

        $dish = Dish::findOrFail($data['pass_id']);
        // imposto delete a true per cancellare in page il piatto(mi resta in database)
        $dish -> delete = 1;
        $dish -> save();
        return redirect() -> route('myDishes');
}

    // edit del ristorante
    public function restaurantEdit()
    {
        $types = Type::all();
        $restaurant = Auth::user();
        return view('pages.restaurant_edit', compact('restaurant', 'types'));
    }

    // update ristorante
    public function restaurantUpdate(Request $request)  
    {
        $data = $request -> validate([
            'brand_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::user()->id],
            'address' => ['string', 'min:4', 'max:255'],
            'city' => ['required', 'string'],
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:10240'],
            'p_iva' => ['required', 'string', 'min:11', 'max:11', 'unique:users,p_iva,' . Auth::user()->id], //unique:tabell,colonna,id va inserito cos' se non cambia il dato non da errore
            'order_min' => ['numeric', 'min:0', 'max:30'],
            'delivery_price' => ['required', 'numeric', 'min:0', 'max:25'],
            'discount' => ['required', 'numeric', 'min:0', 'max:90'],
            'description' => ['string', 'max:20000'],
            'description' => ['nullable','string', 'max:20000'],
            'types' => ['required_with_all'],
        ]);

        // prendo l'img dal form
        $imageFile = $request -> file('image');

        if ($imageFile) {
            // assegno un nome univoco all'img
            $imageName = 'asset' . '/' . rand(100000,999999) . '_' . time() . '.' . $imageFile -> getClientOriginalName();
            // salvo l'img nello storage
            $imageFile -> storeAs('/storage/', $imageName , 'public');
            // aggiungo l'img all'array che salvero' nel db
            $data['image'] = $imageName;
        }
        
        $restaurant = Auth::user();
        
        $restaurant -> update($data);
        
        $types = Type::findOrFail($request -> get('types'));
        $restaurant -> types() -> sync($types);
        $restaurant -> save();
        return redirect() -> route('dashboard');
    }

    // eliminazione ristorante
    public function restaurantDelete(Request $request){
        $data = $request -> validate([
            'pass_id' => 'required|numeric|min:0'
        ]);

        $restaurant = User::findOrFail($data['pass_id']);
        $restaurant -> types() -> detach();
        $restaurant -> save();
        
        $restaurant = User::findOrFail($data['pass_id']);
        $restaurant -> dishes() -> delete();

        $restaurant -> delete();

        return redirect() -> route('home');
        
    }
}