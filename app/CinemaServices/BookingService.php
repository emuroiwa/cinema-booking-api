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
    const MAXSEATS = 10;
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

        $seatDBTotal = $customers->showings->sum('pivot.seats');
        $seatTotal = $seatDBTotal + $seats;
        $seatLeft = self::MAXSEATS - $seatDBTotal;

        // Max of 10 seats can be booked as per requirements
        if ($seatTotal > self::MAXSEATS) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, only ' . $seatLeft
                . ' seats can be booked at this moment'
            ], 400);
        }

        $customers->showings()->attach($showings, [
                                'seats'=> $seats
                                ]);

        return response()->json([
            'success' => true,
            'message' => 'Seat have been booked'
        ], 200);
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
