<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Showing;
use App\Customer;

class BookingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required|max:50',
            'showing_id' => 'required|max:50',
            'number_of_seats' => 'required|numeric|min:1|max:10',
        ]);

        if (!Customer::find($request['customer_id'])) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, customer with id ' . $request['customer_id']
                . ' cannot be found'
            ], 400);
        }
        if (!Showing::find($request['showing_id'])) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Showing with id ' . $request['showing_id']
                . ' cannot be found'
            ], 400);
        }

        $book = resolve('App\CinemaServices\BookingService');
        return $book->booking($request['customer_id'], $request['showing_id'], $request['number_of_seats']);
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
        // $this->validate($request, [
        //     'customer_id' => 'required|max:50',
        //     'showing_id' => 'required|max:50',
        //     'number_of_seats' => 'required|numeric|min:1|max:10',
        // ]);
        // dd($request);
        $book = resolve('App\CinemaServices\BookingService');
        return $book->booking($id, $request['showing_id'], $request['number_of_seats']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteBooking($customer_id, $showing_id)
    {
        if (!Customer::find($customer_id)) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, customer with id ' . $customer_id
                . ' cannot be found'
            ], 400);
        }
        if (!Showing::find($showing_id)) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Showing with id ' . $showing_id
                . ' cannot be found'
            ], 400);
        }

        $book = resolve('App\CinemaServices\BookingService');
        return $book->deleteBooking($customer_id, $showing_id);
    }
}
