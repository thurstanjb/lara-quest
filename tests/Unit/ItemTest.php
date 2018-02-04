<?php

namespace Tests\Unit;

use App\Item;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function _item_factory_test(){
        $item = create(Item::class, ['name' => 'Thurstans Item']);

        $this->assertEquals('Thurstans Item', $item->name);
    }

    /** @test */
    public function _an_item_can_return_its_users(){
        $user1 = create(User::class);
        $user2 = create(User::class);
        $item = create(Item::class);

        $user1->inventory()->attach($item);
        $user2->inventory()->attach($item);

        $this->assertCount(2, $item->users);

        $this->assertEquals($user1->inventory->first()->name, $item->name);
    }
}
