<?php

namespace App\Http\Controllers;

use App\Models\Matter;
use App\Models\Customer;
use Illuminate\Http\Request;

class MatterController extends Controller
{
    public function index()
    {
        $matters = Matter::getMatterList();
        $data = ['matters' => $matters];
        return view('matters.index', $data);
    }

    public function customer_select(Customer $customer)
    {
        $customers = Customer::all();
        $data = ['customers' => $customers];
        return view('matters.customer_select', $data);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create_first()
    {
        return view('matters.create_first');
    }


    public function create(Customer $customer)
    {
        $data = ['customer' => $customer];
        return view('matters.create', $data);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(MatterRequest $request)
    {
        $matter = new Matter();
        $matter->user_id = Auth::id();
        $form = $request->all();
        unset($form['_token']);
        $matter->fill($form)->save();

        return redirect(route('matters.index'));
    }
}
