<?php

namespace App\Http\Controllers;

use  App\Models\Estimate;
use  App\Models\Matter;
use  App\Models\Item;
use Illuminate\Http\Request;

class EstimateController extends Controller
{

    public function index()
    {
        $estimates = Estimate::all();

        return view('estimates/index', [
            'estimates' => $estimates,
        ]);
    }
    public function create(Matter $matter)
    {
        $data = ['matter' => $matter];
        return view('estimates.create', $data);
    }

    public function store(Request $request, Matter $matter, Estimate $estimate)
    {

        $estimate->title = $request->title;

        $items = $request->items;

        for ($i = 0; $i < count($items); $i++) {
            $estimate->location = $items[$i]['name'];
            $estimate->customer = $items[$i]['unit'];
            $estimate->save();
        }
    }
}
