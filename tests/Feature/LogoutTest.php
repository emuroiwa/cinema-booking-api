<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A test User Is LoggedOut Properly
     *
     * @return void
     */
    public function testUserIsLoggedOutProperly()
    {
        $user = factory(User::class)->create(['email' => 'test@test.com']);
        $token = JWTAuth::fromUser($user);
        $headers = ['Authorization' => "Bearer $token"];

        $this->json('post', '/api/logout', [], $headers)->assertStatus(200);

        $this->assertJson([
            'message' => 'Successfully logged out'
            ]);
    }
}
