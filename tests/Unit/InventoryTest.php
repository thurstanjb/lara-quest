<?php

namespace Tests\Unit;

use App\Item;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class InventoryTest extends TestCase
{
    use DatabaseMigrations;

    public $user;

    public function setUp()
    {
        parent::setUp();
        $this->user = create(User::class);
    }

    /** @test */
    public function _a_user_can_be_reset(){
        $this->user->reset();

        $this->assertEquals('start', $this->user->location);
        $this->assertEquals(100, $this->user->health);
        $this->assertFalse($this->user->isDead());
    }

    /** @test */
    public function _a_user_can_return_its_inventory(){
        $item1 = create(Item::class);
        $item2 = create(Item::class);

        $this->user->inventory()->attach($item1);
        $this->user->inventory()->attach($item2);

        $this->assertCount(2,$this->user->inventory);
    }

    /** @test */
    public function _a_user_can_have_more_than_one_of_the_same_item(){
        $item1 = create(Item::class);
        $this->user->inventory()->attach($item1);
        $this->user->inventory()->attach($item1);

        $this->assertCount(2, $this->user->inventory);
    }

    /** @test */
    public function _a_user_can_return_how_many_of_a_particular_item_is_in_the_inventory(){
        $item1 = create(Item::class, ['slug' => 'key']);
        $item2 = create(Item::class, ['slug' => 'apple']);

        $this->user->inventory()->attach($item1);
        $this->user->inventory()->attach($item1);
        $this->user->inventory()->attach($item2);

//        dd($this->user->inventory);
        $this->assertEquals(2, $this->user->inventoryCount($item1));
        $this->assertEquals(1, $this->user->inventoryCount($item2));
    }

    /** @test */
    public function _a_user_can_return_a_unique_list_of_all_inventory_items(){
        $item1 = create(Item::class, ['slug' => 'key']);
        $item2 = create(Item::class, ['slug' => 'apple']);

        $this->user->inventory()->attach($item1);
        $this->user->inventory()->attach($item1);
        $this->user->inventory()->attach($item2);

        $this->assertCount(2, $this->user->inventoryList());
        $this->assertEquals(2, $this->user->inventoryList()[0]['count']);
    }
}
