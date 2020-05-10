<?php

use Illuminate\Database\Seeder;
use App\Showing;

class CreateShowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $showing = Showing::create([
            'show_time' => '2020-12-01 12:12:22',
            'movie_id' => '1'
        ]);
    }
}
