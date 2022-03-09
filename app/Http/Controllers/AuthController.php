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
        $dishes = User::find(Auth::User() -> id) -> dishes;

        return view('pages.my_dishes', compact('dishes'));
    }

    public function myOrders()
    {
        $dishes = User::find(Auth::User() -> id) -> dishes;

        $listOrders = [];

        foreach ($dishes as $dish) {
            
            $orders = Dish::find($dish -> id) -> orders;
            array_push($listOrders, $orders);
        }

         // Get orders grouped by delivery_time
         $order = DB::table('dish_order')
         ->select('dish_id', DB::raw('count(*) as total'))
         ->groupBy('dish_id')
         ->orderBy('total', 'desc')->limit(10)->get();
        $order = json_decode($order);

        $dishName = [];
        $total = [];

        foreach ($order as $tot) {
            array_push($total, $tot -> total);
            $dish = Dish::findOrFail($tot -> dish_id);
            array_push($dishName, $dish -> name);
        }
        // dd($dishName);

        // Generate random colours for the groups
        for ($i=0; $i<=count($order); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }


        // Prepare the data for returning with the view
        $chart = new Chart;
        $chart->labels = (array_values($dishName));
        $chart->dataset = (array_values($total));
        $chart->colours = $colours;
        // dd($chart);

        return view('pages.my_orders', compact('listOrders', 'chart'));
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
            $imageName = rand(100000,999999) . '_' . time() . '.' . $imageFile -> getClientOriginalName();
            // salvo l'img nello storage
            $imageFile -> storeAs('/storage/', $imageName , 'public');
            // aggiungo l'img all'array che salvero' nel db
            $data['image'] = $imageName;
        }
        
        $restaurant = Auth::user();
        // if (Auth::user()->email != $request->email) {
        //     $email = $request -> validate(['email' => ['required', 'string', 'email', 'max:255', 'unique:users']]);
        //     $restaurant -> update($email);
        // }
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

    public function index()
    {

        // SELECT dish_id, COUNT(*)as tot FROM dish_order GROUP BY dish_id ORDER by tot DESC

        // Get orders grouped by delivery_time
        $order = DB::table('dish_order')
                ->select('dish_id', DB::raw('count(*) as total'))
                ->groupBy('dish_id')
                ->orderBy('total', 'desc')->limit(10)->get();
        $order = json_decode($order);

        $dishName = [];
        $total = [];

        foreach ($order as $tot) {
            array_push($total, $tot -> total);
            $dish = Dish::findOrFail($tot -> dish_id);
            array_push($dishName, $dish -> name);
        }
        // dd($dishName);

        // Generate random colours for the groups
        for ($i=0; $i<=count($order); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }


        // Prepare the data for returning with the view
        $chart = new Chart;
        $chart->labels = (array_values($dishName));
        $chart->dataset = (array_values($total));
        $chart->colours = $colours;
        // dd($chart);
        return view('layouts.index', compact('chart'));

    }
}