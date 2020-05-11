<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Showing;
use Faker\Generator as Faker;

$factory->define(Showing::class, function (Faker $faker) {
    return [
        'show_time' =>  date('Y-m-d H:i:s'),
        'movie_id' => $faker->randomDigit
    ];
});
