<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\TestCase;
use App\User;
use App\Customer;
use App\Showing;

class BookingTest extends TestCase
{
    use RefreshDatabase;
    protected $user;

    /**
     * Create user and get token
     * @return string
     */
    protected function authenticate()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'Booking@gmail.com',
            'password' => Hash::make('secret1234'),
        ]);
        $this->user = $user;
        $token = JWTAuth::fromUser($user);
        return $token;
    }

    /**
     * A tests Bookings Are CreatedCorrectly
     *
     * @return void
     */
    public function testsBookingsAreCreatedCorrectly()
    {
        //Get token
        $token = $this->authenticate();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'customer_id' =>  1,
            'showing_id' => 1,
            'seats' => 1
        ];

        $this->json('POST', '/api/bookings', $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                "message"=> "Booking Details Updated",
            ]);
    }

    /**
     * A tests Bookings Are Updated Correctly
     *
     * @return void
     */
    public function testsBookingsAreUpdatedCorrectly()
    {
        //Get token
        $token = $this->authenticate();
        $headers = ['Authorization' => "Bearer $token"];
        $booking = DB::table('customer_showing')->insert([
            'customer_id' =>  1,
            'showing_id' => 1,
            'seats' => 1
        ]);

        $payload = [
            'Booking_name' => 'Test loren2',
        ];

        $response = $this->json('PUT', '/api/bookings/' . $booking->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Booking Details Updated'
            ]);
    }

    /**
     * A tests Bookings Are Deleted Correctly
     *
     * @return void
     */

    public function testsBookingsAreDeletedCorrectly()
    {
        //Get token
        $token = $this->authenticate();
        $headers = ['Authorization' => "Bearer $token"];
        $booking = DB::table('customer_showing')->insert([
            'customer_id' =>  1,
            'showing_id' => 1,
            'seats' => 1
        ]);

        $this->json('DELETE', '/api/bookings/' . $booking->id, [], $headers)
            ->assertStatus(204);
    }
}
