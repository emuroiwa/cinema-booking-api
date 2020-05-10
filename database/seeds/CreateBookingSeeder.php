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
        $customerIds = DB::table('customers')->pluck('id');
        $showingIds = DB::table('showings')->pluck('id');

        foreach ((range(0, 2)) as $index) {
            DB::table('customer_showing')->insert(
                [
                'customer_id' => $customerIds[$index],
                'showing_id' => $showingIds[$index],
                'seats' => '1'
            ]
            );
        }
    }
}
