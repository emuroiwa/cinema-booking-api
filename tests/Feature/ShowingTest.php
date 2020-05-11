<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\TestCase;
use App\User;
use App\Showing;

class ShowingTest extends TestCase
{
    use RefreshDatabase;
    protected $user;

    /**
     * Create user and get token
     * @return string
     */
    protected function authenticate()
    {
        $user = User::create([
            'name' => 'test',
            'email' => 'Showing@gmail.com',
            'password' => Hash::make('secret1234'),
        ]);
        $this->user = $user;
        $token = JWTAuth::fromUser($user);
        return $token;
    }

    /**
     * A tests Showings Are CreatedCorrectly
     *
     * @return void
     */
    public function testsShowingsAreCreatedCorrectly()
    {
        //Get token
        $token = $this->authenticate();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'show_time' =>  date('Y-m-d H:i:s'),
            'movie_id' => 1
        ];

        $this->json('POST', '/api/showings', $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                "message"=> "Showing Details Updated",
            ]);
    }

    /**
     * A tests Showings Are Updated Correctly
     *
     * @return void
     */
    public function testsShowingsAreUpdatedCorrectly()
    {
        //Get token
        $token = $this->authenticate();
        $headers = ['Authorization' => "Bearer $token"];
        $showing = factory(Showing::class)->create([
            'show_time' =>  date('Y-m-d H:i:s'),
            'movie_id' => 1
        ]);

        $payload = [
            'Showing_name' => 'Test loren2',
        ];

        $response = $this->json('PUT', '/api/showings/' . $showing->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Showing Details Updated'
            ]);
    }

    /**
     * A tests Showings Are Deleted Correctly
     *
     * @return void
     */

    public function testsShowingsAreDeletedCorrectly()
    {
        //Get token
        $token = $this->authenticate();
        $headers = ['Authorization' => "Bearer $token"];
        $showing = factory(Showing::class)->create([
            'show_time' =>  date('Y-m-d H:i:s'),
            'movie_id' => 1
        ]);

        $this->json('DELETE', '/api/showings/' . $showing->id, [], $headers)
            ->assertStatus(204);
    }
}
