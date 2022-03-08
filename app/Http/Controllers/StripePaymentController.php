<?php

namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Order;
use App\Guest;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderShipped;

   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function saveCart(Request $request){

        $jsonBody = json_decode($request->getContent(), true);
        Session::put('cart', $jsonBody);

    }

    public function stripe()
    {
        $cart = Session::get('cart');

        $payment = $cart['tot'];

        return view('pages.stripe', compact('payment'));
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $cartTot = Session::get('cart');
        $payment = $cartTot['tot'];


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $payment * 100,
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);

        $data = $request -> validate([
            'name' => 'required|string',
            'lastname' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string',
        ]);

        Session::flash('success', 'Pagamento avvenuto con successo!');

        $order = Order::make();
        $order -> status_pay = true;
        $order -> delivery_time = rand(5,60);
        
        $order -> save();

        $cartData = Session::get('cart');
        $cart = $cartData['cartDishes'];
        foreach ($cart as $dish) {
            $order->dishes()->attach($dish['id'], ['quantity' => $dish['quantity']]);
        };

        $guest = Guest::make($data);
        $guest -> order_id = $order -> id;
        $guest -> save();

        Mail::to($guest->email) ->send (new OrderShipped( $guest, $cartData,$order));
        Mail::to('admin@kokolivery.com') ->send (new OrderShipped( $guest, $cartData,$order));

        return back();
    }
}
