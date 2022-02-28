<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'brand_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'address' => ['string', 'min:4', 'max:255'],
            'city' => ['required', 'string'],
            'image' => ['image', 'mimes:jpeg,png,jpg', 'max:10240'],
            'p_iva' => ['required', 'string', 'min:11', 'max:11'],
            'order_min' => ['numeric', 'min:0', 'max:30'],
            'delivery_price' => ['required', 'numeric', 'min:0', 'max:25'],
            'discount' => ['required', 'numeric', 'min:0', 'max:90'],
            'description' => ['string', 'max:20000'],
        ]);

        // // prendo l'img dal form
        // $imageFile = $request -> file('image');
        // // assegno un nome univoco all'img
        // $imageName = rand(100000,999999) . '_' . time() . '.' . $imageFile -> getClientOriginalName();
        // // salvo l'img nello storage
        // $imageFile -> storeAs('/asset/', $imageName , 'public');
        // // aggiungo l'img all'array che salvero' nel db
        // $data['image'] = $imageName;
        // salvo l'array nel db
        // User::create($data);
        
        // torno alla home
        return redirect() -> route('home');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // prendo l'img dal form
        $imageFile = $data['image'];
        // assegno un nome univoco all'img
        $imageName = rand(100000,999999) . '_' . time() . '.' . $imageFile -> getClientOriginalName();
        // salvo l'img nello storage
        $imageFile -> storeAs('/asset/', $imageName , 'public');
        // aggiungo l'img all'array che salvero' nel db
        $data['image'] = $imageName;
        // dd($data['image']);
        // salvo l'array nel db
        // dd($data);
        return User::create([
            'brand_name' => $data['brand_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'city' => $data['city'],
            $data['image'] = $imageName,
            'p_iva' => $data['p_iva'],
            'order_min' => $data['order_min'],
            'delivery_price' => $data['delivery_price'],
            'discount' => $data['discount'],
            'description' => $data['description'],
        ]);
        
    }
}
