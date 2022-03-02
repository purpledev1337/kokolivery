<?php

namespace App\Http\Controllers;
use App\Dish;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
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
        return view('pages.my_orders', compact('listOrders'));
    }

}
