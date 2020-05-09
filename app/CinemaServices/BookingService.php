<?php

namespace App\CinemaServices;

use App\Customer;
use App\Showing;

/**
* Booking Service class to process booking
* Authour Ernest Muroiwa
* 09-May-2020
*/
class BookingService
{
    /**
     * processes booking
     *
     * @param  int $user
     * @param  int $showing
     * @param  int $seats
     * @return \Illuminate\Http\Response
     */
    public function booking($customer_id, $showing_id, $seats)
    {
        $customers = Customer::find($customer_id);
        $showings = Showing::find($showing_id);

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

        $customers->showings()->attach($showings, [
                                'seats'=> $seats
                                ]);

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Delete booking
     *
     * @param  int $customer
     * @param  int $showing
     * @return \Illuminate\Http\Response
     */
    public function deleteBooking($customer_id, $showing_id)
    {
        $customers = Customer::find($customer_id);

        if (!$customers) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, customer with id ' . $customer_id
                . ' cannot be found'
            ], 400);
        }

        $customers->showings()->detach($showing_id);

        return response()->json([
            'success' => true
        ]);
    }
}
