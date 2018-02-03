<?php

namespace Tests\Unit;

use App\Item;
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
}
