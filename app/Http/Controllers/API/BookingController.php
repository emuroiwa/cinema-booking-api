<?php

namespace App\Http\Controllers\API;

use App\CinemaServices\BookingService;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingStoreRequest;
use App\Http\Requests\BookingUpdateRequest;
use App\Http\Requests\ShowingDeleteRequest;
use App\Showing;
use App\Customer;

class BookingController extends Controller
{



    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\BookingStoreRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(BookingStoreRequest $request)
    {
        //validate
        $validated = $request->validated();

        //$booking = resolve('App\CinemaServices\BookingService');
        return app()->make(BookingService)->booking($request['customer_id'], $request['showing_id'], $request['number_of_seats']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\BookingUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingUpdateRequest $request, $id)
    {
        //validate
        $validated = $request->validated();

        //$booking = resolve('App\CinemaServices\BookingService');
        return app()->make(BookingService)->booking($id, $request['showing_id'], $request['number_of_seats']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Http\Requests\ShowingDeleteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function deleteBooking(ShowingDeleteRequest $request)
    {
        $validated = $request->validated();

        //$booking = resolve('App\CinemaServices\BookingService');
        return app()->make(BookingService)->deleteBooking($request['customer_id'], $request['showing_id']);
    }
}
