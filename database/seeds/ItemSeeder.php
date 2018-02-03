<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')
            ->insert([
            'name' => 'Key',
            'slug' => 'key',
            'life' => 1,
            ]);
        DB::table('items')
            ->insert([
                'name' => 'Pipe',
                'slug' => 'pipe',
                'life' => 50,
                'single_use' => false
            ]);
        DB::table('items')
            ->insert([
                'name' => 'Apple',
                'slug' => 'apple',
                'life' => 50,
                'single_use' => true
            ]);
    }
}
