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
        foreach ((range(1, 3)) as $index) {
            Showing::create([
                'show_time' => date('Y-m-d H:i:s'),
                'movie_id' => $index
            ]);
        }
    }
}
