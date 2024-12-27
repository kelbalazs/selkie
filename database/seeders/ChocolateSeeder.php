<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chocolate;

class ChocolateSeeder extends Seeder
{
    public function run()
    {
        Chocolate::create([
            'name' => 'Dark Chocolate',
            'description' => 'Rich and smooth dark chocolate with 70% cocoa.',
            'price' => 3.50,
            'image' => 'images/chocolates/dark.jpg',
        ]);

        Chocolate::create([
            'name' => 'Milk Chocolate',
            'description' => 'Creamy milk chocolate perfect for all ages.',
            'price' => 2.99,
            'image' => 'milk_chocolate.jpg',
        ]);
    }
}
