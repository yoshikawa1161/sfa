<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matter;
use App\Models\Report;
use App\Models\Customer;

class MapController extends Controller
{
    public function delivery_map()
    {
        return view('maps.delivery_map');
    }

    public function set_delivery()
    {
        $data = Matter::getDeliveryList();
        return json_encode($data);
    }
}
