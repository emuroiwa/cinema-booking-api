<?php

namespace Tests\Feature\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class LoginTest extends TestCase
{
    // use RefreshDatabase;
    // /**
    //  * Login test.
    //  *
    //  * @return void
    //  */
    // public function testRequiresEmailAndLogin()
    // {
    //     $this->json('POST', 'api/login')
    //         ->assertStatus(422)
    //         ->assertJson([
    //             "message"=> "The given data was invalid.",
    //             "errors" => [
    //                 'email' => ['The email field is required.'],
    //                 'password' => ['The password field is required.'],
    //             ]
    //         ]);
    // }

    // /**
    //  * Login test User Logins Successfully.
    //  *
    //  * @return void
    //  */
    // public function testUserLoginsSuccessfully()
    // {
    //     $user = factory(User::class)->create([
    //         'email' => 'test@test.co.uk',
    //         'password' => bcrypt('12345678'),
    //     ]);

    //     $payload = ['email' => 'test@test.co.uk', 'password' => '12345678'];

    //     $this->json('POST', 'api/login', $payload)
    //         ->assertStatus(200);
    // }
}
