Ciao  {{ $guest ->name}}, {{$guest ->lastname}}
<br>
il tuo ordine numero: {{$guest ->order_id}} <br>
arriverà in : {{ $guest ->address}} <br>

il pagamento di € {{ $cartData['tot']}} <br>
hai ordinato:
@foreach ( $cartData['cartDishes'] as $dish)
<li> {{$dish['quantity']}}x - {{$dish['name']}} - €{{$dish['price']}}</li>
@endforeach
<br>
Il tuo ordine arriverà tra:{{$order['delivery_time']}} minuti <br>


Grazie per aver acquistato da KoKolivery


