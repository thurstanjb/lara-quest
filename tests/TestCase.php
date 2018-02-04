<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function signIn($user = null, $user_type = 'auth'){

        $new_user = $user ?: create(User::class, ['user_type' => $user_type]);
        $this->actingAs($new_user);

        return $this;
    }
}
