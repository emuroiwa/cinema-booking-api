<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tests\TestCase;
use App\User;
use App\Customer;

class CustomerTest extends TestCase
{
//     use RefreshDatabase;
//     protected $user;

//     /**
//      * Create user and get token
//      * @return string
//      */
//     protected function authenticate()
//     {
//         $user = User::create([
//             'name' => 'test',
//             'email' => 'test@gmail.com',
//             'password' => Hash::make('secret1234'),
//         ]);
//         $this->user = $user;
//         $token = JWTAuth::fromUser($user);
//         return $token;
//     }

//     /**
//      * A tests Customers Are CreatedCorrectly
//      *
//      * @return void
//      */
//     public function testsCustomersAreCreatedCorrectly()
//     {
//         //Get token
//         $token = $this->authenticate();
//         $headers = ['Authorization' => "Bearer $token"];
//         $payload = [
//             'name' => 'Test loren',
//             'email' => 'testuser@test.com',
//         ];

//         $this->json('POST', '/api/customers', $payload, $headers)
//             ->assertStatus(200)
//             ->assertJson([
//                 'success' => true,
//                 "message"=> "Customer Details Updated",
//             ]);
//     }

//     /**
//      * A tests Customers Are Updated Correctly
//      *
//      * @return void
//      */
//     public function testsCustomersAreUpdatedCorrectly()
//     {
//         //Get token
//         $token = $this->authenticate();
//         $headers = ['Authorization' => "Bearer $token"];
//         $customer = factory(Customer::class)->create([
//             'name' => 'Test loren1',
//             'email' => 'testuser1@test.com',
//         ]);

//         $payload = [
//             'name' => 'Test loren2',
//             'email' => 'testuser2@test.com',
//         ];

//         $response = $this->json('PUT', '/api/customers/' . $customer->id, $payload, $headers)
//             ->assertStatus(200)
//             ->assertJson([
//                 'success' => true,
//                 'message' => 'Customer Details Updated'
//             ]);
//     }

//     /**
//      * A tests Customers Are Deleted Correctly
//      *
//      * @return void
//      */

//     public function testsCustomersAreDeletedCorrectly()
//     {
//         //Get token
//         $token = $this->authenticate();
//         $headers = ['Authorization' => "Bearer $token"];
//         $customer = factory(Customer::class)->create([
//             'name' => 'Test loren1',
//             'email' => 'testuser1@test.com',
//         ]);

//         $this->json('DELETE', '/api/customers/' . $customer->id, [], $headers)
//             ->assertStatus(204);
//     }
}
