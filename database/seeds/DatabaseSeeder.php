<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateUserSeeder::class);
        $this->call(CreateCustomerSeeder::class);
        $this->call(CreateMovieSeeder::class);
        $this->call(CreateShowingSeeder::class);
        $this->call(CreateBookingSeeder::class);
    }
}
