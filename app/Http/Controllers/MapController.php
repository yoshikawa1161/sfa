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
    public function approach_map()
    {
        return view('maps.approach_map');
    }

    public function set_approach()
    {
        $data = Matter::getApproachList();
        return json_encode($data);
    }

    public function meeting_map()
    {
        return view('maps.meeting_map');
    }

    public function set_meeting()
    {
        $data = Matter::getMeetingList();
        return json_encode($data);
    }

    public function demo_map()
    {
        return view('maps.demo_map');
    }

    public function set_demo()
    {
        $data = Matter::getDemoList();
        return json_encode($data);
    }

    public function final_meeting_map()
    {
        return view('maps.final_meeting_map');
    }

    public function set_final_meeting()
    {
        $data = Matter::getFinalMeetingList();
        return json_encode($data);
    }
}
