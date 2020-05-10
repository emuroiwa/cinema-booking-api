<?php

use Illuminate\Database\Seeder;
use App\Customer;
use Illuminate\Support\Str;

class CreateCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) {
            $customer = Customer::create([
                'name' => Str::random(8),
                'email' => Str::random(12) .'@test.co.uk'
            ]);
        }
    }
}
