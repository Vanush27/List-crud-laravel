<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->get();
        return response()->json($customers);
    }


    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->save();

        return response()->json($customer);
    }


    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }


    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->update();

        return response()->json($customer);

    }


    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return response()->json($customer);
    }
}
