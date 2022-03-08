<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
 //collego le informazioni tramite costruttore
    public  $guest;
    public   $cartData;
    public $order;

    public function __construct( $guest, $cartData,$order)
    {
        $this -> guest =  $guest;
        $this ->  cartData = $cartData;
        $this -> order =  $order;
    }

    //inserisco email del mittente e collego la pagina in blade del mess
    public function build()
    {
        return $this    ->from('no-replays@kokolivery.com')
                        ->view('mail.orderShipperd');
    }
}
