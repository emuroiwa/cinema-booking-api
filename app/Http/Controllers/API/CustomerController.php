<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CustomerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerStoreRequest $request)
    {
        try {
            //validate
            $validated = $request->validated();

            Customer::create([
                'name' => $request['name'],
                'email' => $request['email'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Customer Details Added'
            ], 201);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CustomerStoreRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerStoreRequest $request, $id)
    {
        try {
            //validate
            $validated = $request->validated();

            $customer = Customer::findOrFail($id);
            $customer->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Customer Details Updated'
            ], 200);
        } catch (\ModelNotFoundException $ex) {
            // customer not found
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 422);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();

            return 204;
        } catch (\ModelNotFoundException $ex) {
            // customer not found
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 422);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }
}
