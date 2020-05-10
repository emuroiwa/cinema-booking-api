<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;

class CreateUserSeeder extends Seeder
{
    /**
      * Run the database seeds.
      *
      * @return void
      */
    public function run()
    {
        for ($i=0; $i < 3; $i++) {
            User::create([
                'name' => Str::random(8),
                'email' => Str::random(8) .'@test.co.uk',
                'password' => bcrypt('12345678')
            ]);
        }
    }
}
