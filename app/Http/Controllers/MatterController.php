<?php

namespace App\Http\Controllers;

use App\Models\Matter;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\MatterRequest;
use Illuminate\Support\Facades\Auth;
use App\Policies\MatterPolicy;


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

    public function edit(Matter $matter)
    {
        $data = ['matter' => $matter];
        return view('matters.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MatterRequest $request, Matter $matter)
    {
        $form = $request->all();
        unset($form['_token']);
        $matter->fill($form)->save();
        return redirect(route('matters.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matter $matter)
    {
        $this->authorize($matter);
        $matter->delete();
        return redirect(route('matters.index'));
    }
    public function order_status(Request $request, Matter $matter)
    {
        $matter->status = $request->status;
        $matter->save();
        $data = ['matter' => $matter];
        return view('matters.order_status', $data);
    }

    public function order_date(Request $request, Matter $matter)
    {
        $matter->order_date = $request->order_date;
        $matter->save();
        return redirect(route('matters.order_list'));
    }

    public function order_list(Request $request, Matter $matter)
    {

        $matters = Matter::getOrderList();

        $data = ['matters' => $matters];
        return view('matters.order_list', $data);
    }
}
