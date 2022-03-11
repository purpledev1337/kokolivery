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
