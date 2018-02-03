<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserNavigationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function _when_a_user_logs_in_they_go_to_their_set_location(){
        $user = create(User::class);

        $this->signIn($user);

        $this->get('/home')
            ->assertRedirect(route($user->location));
    }
}
