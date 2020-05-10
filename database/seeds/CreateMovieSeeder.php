<?php

use Illuminate\Database\Seeder;
use App\Movie;

class CreateMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movie = Movie::create([
            'movie_name' => 'Dark Night'
        ]);
    }
}
