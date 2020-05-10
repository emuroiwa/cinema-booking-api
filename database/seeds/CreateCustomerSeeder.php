<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CreateCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = Customer::create([
            'name' => 'Test Customer',
            'email' => 'customer@test.co.uk'
        ]);
    }
}
