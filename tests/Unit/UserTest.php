<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = create(User::class);
    }

    /** @test */
    public function _user_factory_check(){
        $user = create(User::class, ['name' => 'Thurstan']);

        $this->assertEquals('Thurstan', $user->name);
    }

    /** @test */
    public function _a_user_can_change_location(){
        $this->user->changeLocation('old_house.kitchen');

        $this->assertEquals('old_house.kitchen', $this->user->location);
    }

    /** @test */
    public function _a_user_can_take_damage(){
        $this->user->damage(10);

        $this->assertEquals(90, $this->user->health);
    }

    /** @test */
    public function _a_user_can_be_revived(){
        $this->user->damage(50);
        $this->user->revive(20);

        $this->assertEquals(70, $this->user->health);
    }

    /** @test */
    public function _a_users_health_cannot_go_below_zero(){
        $this->user->damage(110);

        $this->assertEquals(0, $this->user->health);
    }

    /** @test */
    public function _a_users_health_cannot_be_more_than_100(){
        $this->user->revive(50);

        $this->assertEquals(100, $this->user->health);
    }

    /** @test */
    public function _a_user_can_check_if_they_are_dead(){
        $this->user->damage(100);

        $this->assertTrue($this->user->isDead());
    }

    /** @test */
    public function _a_user_can_be_reset(){
        $this->user->reset();

        $this->assertEquals('start', $this->user->location);
        $this->assertEquals(100, $this->user->health);
        $this->assertFalse($this->user->isDead());
    }
}
