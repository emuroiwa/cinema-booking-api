<?php

use Illuminate\Database\Seeder;
use App\Booking;

class CreateBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $booking = Booking::create([
            'customer_id' => '1',
            'showing_id' => '1',
            'number_of_seats' => '1'
        ]);
    }
}
