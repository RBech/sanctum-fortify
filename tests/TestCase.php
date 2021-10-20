<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create a user
     *
     * @param array $overrides
     * @return User
     */
    protected function user(array $overrides = []): User
    {
        /** @var User $user */
        $user = User::factory()->create($overrides);
        return $user;
    }

    /**
     * Act as a user
     *
     * @param null $api
     * @return $this
     */
    protected function actingAsUser($api = null, array $overrides = []): TestCase
    {
        $this->actingAs($this->user($overrides), $api);
        return $this;
    }
}
