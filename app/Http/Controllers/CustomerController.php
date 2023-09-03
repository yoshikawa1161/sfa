<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function home()
    {
        return view('home');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        $data = ['customers' => $customers];
        return view('customers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Customer $customer)
    {

        $data = ['customer' => $customer];
        return view('customers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $customer = new Customer();
        $address = $request->address;
        $apiurl = "https://maps.googleapis.com/maps/api/geocode/json?address=.$address.&language=Ja&key=AIzaSyBO3NaNbHB8aa92Tut6nSxxkcQbrK8eNGI";
        $json = json_decode(@file_get_contents($apiurl), false);
        $lat = $json->results[0]->geometry->location->lat;
        $lng = $json->results[0]->geometry->location->lng;
        $customer->lat = $lat;
        $customer->lng = $lng;

        if (isset($request->name_card_image_path)) {
            $name_card_image_path = $request->name_card_image_path->store('img', 'public');
        } else {
            $name_card_image_path = null;
        }

        $customer->img_path = $name_card_image_path;
        $form = $request->all();
        unset($form['_token']);
        $customer->fill($form)->save();

        return redirect(route('customers.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $data = ['customer' => $customer];
        return view('customers.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $data = ['customer' => $customer];
        return view('customers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer)
    {

        if (Storage::exists("/public/$request->name_card_image_path")) {
            $name_card_image_path = $request->name_card_image_path;
        } else {
            if (isset($request->name_card_image_path)) {
                $name_card_image_path = $request->name_card_image_path->store('img', 'public');
            } else {
                $name_card_image_path = null;
            }
        }
        $customer->img_path = $name_card_image_path;

        $address = $request->address;
        $apiurl = "https://maps.googleapis.com/maps/api/geocode/json?address=.$address.&language=Ja&key=AIzaSyBO3NaNbHB8aa92Tut6nSxxkcQbrK8eNGI";
        $json = json_decode(@file_get_contents($apiurl), false);
        $lat = $json->results[0]->geometry->location->lat;
        $lng = $json->results[0]->geometry->location->lng;
        $customer->lat = $lat;
        $customer->lng = $lng;

        $form = $request->all();
        unset($form['_token']);
        $customer->fill($form)->save();
        return redirect(route('customers.show', $customer));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect(route('customers.index'));
    }
}
