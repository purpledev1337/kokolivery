<?php

namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Order;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

    protected $data ;
    
    public function saveCart(Request $request){
        $jsonBody = json_decode($request->getContent(), true);
        // dd($jsonBody);
        Session::put('cart', $jsonBody);
    }

    public function stripe()
    {
        $cart = Session::get('cart');
        // dd($cart['cart']);

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
        $cart = Session::get('cart');
        foreach ($cart as $item) {
            $payment = $item;
        };
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $d,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);

        Session::flash('success', 'Pagamento avvenuto con successo!');
        $order = Order::make();
        $order -> status_pay = true;
        $order -> delivery_time = rand(5,60);
        $order -> save();
        return back();
    }
}
