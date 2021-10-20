<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login()
    {
        $user = $this->user();

        $response = $this->post('api/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertOk();
    }

    public function test_user_can_logout()
    {
        $response = $this->actingAsUser()->post('api/logout');

        $response->assertNoContent();
    }

    public function test_user_can_change_password()
    {
        $response = $this->actingAsUser()->putJson('api/user/password', [
            'current_password' => 'password',
            'password' => 'new_password',
            'password_confirmation' => 'new_password'
        ]);

        $response->assertOk();
    }
}
