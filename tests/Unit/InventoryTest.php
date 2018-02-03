<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InventoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function _inventory_factory_test(){
        $inv = create(Inventory::class);
    }
}
