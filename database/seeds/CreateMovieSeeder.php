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
        $arr = array('Dark Night','Dark Night Rasies', 'Inception');
        foreach ($arr as &$value) {
            Movie::create([
            'movie_name' => $value
            ]);
        }
    }
}
