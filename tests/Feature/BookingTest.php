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

    /**
     * A tests Bookings Are CreatedCorrectly
     *
     * @return void
     */
    public function testsAcustomerBelongsToManyShowings()
    {
        $customer = factory('App\Customer')->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $customer->showings);
    }
}
