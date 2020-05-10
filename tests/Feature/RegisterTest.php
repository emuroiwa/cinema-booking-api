<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A tests Registers Successfully.
     *
     * @return void
     */
    public function testsRegistersSuccessfully()
    {
        $payload = [
            'name' => 'John',
            'email' => 'john@doe.com',
            'password' => '12345678',
        ];

        $this->json('post', '/api/register', $payload)
            ->assertStatus(200);
    }
    /**
     * A tests Requires Password Email And Name
     *
     * @return void
     */
    public function testsRequiresPasswordEmailAndName()
    {
        $this->json('post', '/api/register')
            ->assertStatus(422)
            ->assertJson([
                "message"=> "The given data was invalid.",
                "errors" => [
                'name' => ['The name field is required.'],
                'email' => ['The email field is required.'],
                'password' => ['The password field is required.'],
                ]
            ]);
    }
}
