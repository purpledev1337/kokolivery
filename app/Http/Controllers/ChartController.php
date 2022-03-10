<?php

namespace App\Http\Controllers;

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

        // SELECT dish_id, COUNT(*)as tot FROM dish_order GROUP BY dish_id ORDER by tot DESC

        // Get orders grouped by delivery_time
        $order = DB::table('dish_order')
                ->select('dish_id', DB::raw('count(*) as total'))
                ->groupBy('dish_id')
                ->orderBy('total', 'desc')->limit(10)->get();
        $order = json_decode($order);

        $dishName = [];
        $total = [];

        foreach ($order as $tot) {
            $total[] = $tot -> total;
            $dish = Dish::findOrFail($tot -> dish_id);
            $dishName[] = $dish -> name;
        }

        // Generate random colours for the groups
        for ($i=0; $i<=count($order); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }


        // Prepare the data for returning with the view
        $chart = new Chart;
        $chart->labels = (array_values($dishName));
        $chart->dataset = (array_values($total));
        $chart->colours = $colours;

        return view('layouts.index', compact('chart'));

    }
}
