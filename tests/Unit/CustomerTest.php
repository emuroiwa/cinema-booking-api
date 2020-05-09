<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

class CustomerTest extends TestCase
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
            'email' => 'test@gmail.com',
            'password' => Hash::make('secret1234'),
        ]);
        $this->user = $user;
        $token = JWTAuth::fromUser($user);
        return $token;
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateCustomer()
    {
        //Get token
        $token = $this->authenticate();
        $response =
        $this->postJson(
            'api/customer',
            [
                'name' => 'Test',
                'email' => 'emuroiwa@gmail.com'
            ],
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ]
        );
        $response->assertStatus(201);
    }
    public function testUpdateCustomer()
    {
        //Get token
        $token = $this->authenticate();
        $response =
        $this->postJson(
            'api/customer',
            [
                'name' => 'Test',
                'email' => 'emuroiwa1@gmail.com'
            ],
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ]
        );
        $response->assertStatus(200);
    }

    // public function testLoggedUserCreatingNewCusomer()
    // {
    //     $this->actingAs(factory('App\User')->create());
    //     $customer = factory('App\Customer')->make();
    //     $this->post('/api/customer', $customer->toArray());
    //     $this->assertEquals(1, \App\Customer::all()->count());
    // }

    /** @test */
    // public function a_task_requires_a_title()
    // {
    //     $this->actingAs(factory('App\User')->create());

    //     $task = factory('App\Customer')->make(['name' => null]);

    //     $this->post('/api/customer/create', $task->toArray())
    //         ->assertSessionHasErrors('name');
    // }
}
