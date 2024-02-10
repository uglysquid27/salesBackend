<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

     /**
     * Store a newly created customer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'num_phone' => 'required|string',
            'address' => 'required|string',
            'paket_id' => 'required|exists:pakets,id',
            'identity_card' => 'required|string',
            'house_photo' => 'required|string',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->num_phone = $request->num_phone;
        $customer->address = $request->address;
        $customer->paket_id = $request->paket_id;
        $customer->identity_card = $request->identity_card;
        $customer->house_photo = $request->house_photo;
        $customer->save();

        return response()->json(['message' => 'Customer created successfully'], 201);
    }

     /**
     * Update the specified customer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'num_phone' => 'required|string',
            'address' => 'required|string',
            'paket_id' => 'required|exists:pakets,id',
            'identity_card' => 'required|string',
            'house_photo' => 'required|string',
        ]);

        $customer = Customer::findOrFail($id);

        $customer->name = $request->name;
        $customer->num_phone = $request->num_phone;
        $customer->address = $request->address;
        $customer->paket_id = $request->paket_id;
        $customer->identity_card = $request->identity_card;
        $customer->house_photo = $request->house_photo;
        $customer->save();

        return response()->json(['message' => 'Customer updated successfully'], 200);
    }

    /**
     * Remove the specified customer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully'], 200);
    }
}
