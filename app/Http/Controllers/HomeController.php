<?php

namespace App\Http\Controllers;
use App\Dish;
use App\Order;
use App\User;

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
    public function index()
    {
        return view('home');
    }
   
    public function dashboard()
    {
       
        return view('pages.dashboard');
    }

    /* public function myDishes($id)
    {
        dd($id);
        $dishes = Dish::findOrFail($id);
        return view('pages.my_dishes',compact('dishes'));

    } 

    public function myOrders($id)
    {
        $orders = Order::findOrFail($id);
        return view('pages.my_orders',compact('ordes'));
    }
 */
}
