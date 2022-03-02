<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class GuestController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function register() 
    {
        $types = Type::all();
        return view('pages.register', compact('types'));
    }
    public function restaurant_list()
    {
        return view('pages.restaurant_list');
    }
    
}
