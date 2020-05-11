<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\TestCase;
use App\User;
use App\Movie;

class MovieTest extends TestCase
{
    // use RefreshDatabase;
    // protected $user;

    // /**
    //  * Create user and get token
    //  * @return string
    //  */
    // protected function authenticate()
    // {
    //     $user = User::create([
    //         'name' => 'test',
    //         'email' => 'movie@gmail.com',
    //         'password' => Hash::make('secret1234'),
    //     ]);
    //     $this->user = $user;
    //     $token = JWTAuth::fromUser($user);
    //     return $token;
    // }

    // /**
    //  * A tests Movies Are CreatedCorrectly
    //  *
    //  * @return void
    //  */
    // public function testsMoviesAreCreatedCorrectly()
    // {
    //     //Get token
    //     $token = $this->authenticate();
    //     $headers = ['Authorization' => "Bearer $token"];
    //     $payload = [
    //         'name' => 'Test loren'
    //     ];

    //     $this->json('POST', '/api/movies', $payload, $headers)
    //         ->assertStatus(200)
    //         ->assertJson([
    //             'success' => true,
    //             "message"=> "Movie Details Updated",
    //         ]);
    // }

    // /**
    //  * A tests Movies Are Updated Correctly
    //  *
    //  * @return void
    //  */
    // public function testsMoviesAreUpdatedCorrectly()
    // {
    //     //Get token
    //     $token = $this->authenticate();
    //     $headers = ['Authorization' => "Bearer $token"];
    //     $movie = factory(Movie::class)->create([
    //         'movie_name' => 'Lorem ipsum test',
    //     ]);

    //     $payload = [
    //         'movie_name' => 'Test loren2',
    //     ];

    //     $response = $this->json('PUT', '/api/movies/' . $movie->id, $payload, $headers)
    //         ->assertStatus(200)
    //         ->assertJson([
    //             'success' => true,
    //             'message' => 'Movie Details Updated'
    //         ]);
    // }

    // /**
    //  * A tests Movies Are Deleted Correctly
    //  *
    //  * @return void
    //  */

    // public function testsMoviesAreDeletedCorrectly()
    // {
    //     //Get token
    //     $token = $this->authenticate();
    //     $headers = ['Authorization' => "Bearer $token"];
    //     $movie = factory(Movie::class)->create([
    //         'movie_name' => 'Test loren1',
    //     ]);

    //     $this->json('DELETE', '/api/movies/' . $movie->id, [], $headers)
    //         ->assertStatus(204);
    // }
}
