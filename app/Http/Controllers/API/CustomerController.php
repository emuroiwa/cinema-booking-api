<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
        ]);

        Customer::create([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Customer Details Added'
        ], 201);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Customer Details Update'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Customer Details Delete'
        ], 201);
    }
}
