<?php

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    static $name;
    return [
        'name' => $name ?: $name = $faker->word,
        'slug' => str_slug($name),
        'life' => 1,
        'type' => 'food',
        'single_use' => true
    ];
});
