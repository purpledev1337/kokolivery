<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Dish;
use App\Chart;
use DB;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // get dishes 
        // SELECT * FROM dishes WHERE user_id = 1
        // $dishes = DB::table('dishes')
        //         ->select('*')
        //         ->where('user_id', Auth::User() -> id)
        //         ->get();

        // SELECT SUM(quantity) FROM dish_order WHERE dish_id = 22

        // SELECT dishes.id, dishes.name, SUM(quantity)
        // FROM dishes
        // JOIN dish_order
        // ON dishes.id = dish_order.dish_id 
        // AND dishes.user_id = 1 AND dish_order.dish_id = 22
        
        // $dishesQuantity = [];

        // foreach ($dishes as $dish) {
            
        //     $dishData = DB::table('dishes')
        //                 ->join('dish_order', function ($join) use($dish) {
        //                     $join->on('dishes.id', '=', 'dish_order.dish_id')
        //                         ->where('dishes.user_id' ,'=', Auth::User() -> id);
        //                         // ->where('dish_order.dish_id' ,'=', $dish -> id);
        //                 })
        //                 ->select('dishes.name', DB::raw('SUM(quantity) as quantity'))
        //                 ->groupBy('dishes.name')
        //                 ->get();
        //                 // if (count($dishesQuantity) < ) {
        //                     $dishesQuantity[] = $dishData[0];
        //                 // }
        // }
        // $array = collect($dishesQuantity)->sortBy('quantity')->reverse()->toArray();
        // dd($array);

    //     SELECT name, SUM(quantity) as sum_quantity
    //     FROM dish_order
    //     JOIN dishes
    //     ON dishes.id = dish_order.dish_id 
    //     AND dishes.user_id = 1 
    //    GROUP BY name
    //    ORDER BY sum_quantity DESC
    
    // dd($dishData);
    
    
    
    // SELECT dish_id, COUNT(*)as tot FROM dish_order GROUP BY dish_id ORDER by tot DESC
    // Get orders grouped by delivery_time
    // $order = DB::table('dish_order')
    //         ->select('dish_id', DB::raw('count(*) as total'))
    //         ->groupBy('dish_id')
    //         ->orderBy('total', 'desc')->limit(5)->get();
    // $order = json_decode($order);
            
        // Query che mi torna tutti i piatti relativi all'utente loggato, con la somma delle volte che il piatto e' stato aggiunto nel carrello, sommando le quantita'
        $dishData = DB::table('dish_order')
                        ->join('dishes', function ($join){
                            $join->on('dishes.id', '=', 'dish_order.dish_id')
                                ->where('dishes.user_id' ,'=', Auth::User() -> id);
                        })
                        ->select('name', DB::raw('SUM(quantity) as sum_quantity'))
                        ->groupBy('name')
                        ->orderBy('sum_quantity', 'desc')
                        ->limit(5)->get();
                        
        $dishName = [];
        $total = [];
        
        // Separo i dati che salvero' nel json
        foreach ($dishData as $dish) {
            // $dish = Dish::findOrFail($tot -> dish_id);
            $total[] = $dish -> sum_quantity;
            $dishName[] = $dish -> name;
        }

        // Genero dei colori random per i gruppi
        for ($i=0; $i<count($dishData); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }


        // Preparo i dati per farli ritornare con un json 
        $chart = new Chart;
        $chart->labels = (array_values($dishName));
        $chart->dataset = (array_values($total));
        $chart->colours = $colours;
        
        // return view('pages.auth.index');
        return json_encode($chart);

    }
}
