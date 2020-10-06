<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'name' => 'Shirt 1',
            'price' => 20,
            'description' => 'This is a shirt1',
            'category_id' => 1,
            'image' => '/images/shirt1.jpg'
        ]);

        Item::create([
            'name' => 'Shirt 2',
            'price' => 30,
            'description' => 'This is a shirt2',
            'category_id' => 1,
            'image' => '/images/shirt2.jpg'
        ]);

        Item::create([
            'name' => 'Dress 1',
            'price' => 20,
            'description' => 'This is a dress1',
            'category_id' => 1,
            'image' => '/images/dress1.jpg'
        ]);

        Item::create([
            'name' => 'Dress 2',
            'price' => 30,
            'description' => 'This is a dress2',
            'category_id' => 1,
            'image' => '/images/dress2.jpg'
        ]);
    }
}
