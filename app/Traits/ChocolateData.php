<?php

namespace App\Traits;

trait ChocolateData
{
    private function getChocolates()
    {
        return [
            ['id' => 1, 'name' => 'Honey Berry', 'description' => 'Rich dark chocolate paired with the sweet taste of honeyberries.', 'price' => 6.99, 'image_url' => asset('images/chocolates/honeyberry.jpg')],
            ['id' => 2, 'name' => 'Simple Dark', 'description' => 'A smooth, rich, and creamy dark chocolate experience.', 'price' => 5.99, 'image_url' => asset('images/chocolates/simple.jpg')],
            ['id' => 3, 'name' => 'Coconut Milk', 'description' => 'Chocolate with coconut milk.', 'price' => 4.20, 'image_url' => asset('images/chocolates/nutty-bliss.jpg')],
            ['id' => 4, 'name' => 'Dark Elegance', 'description' => 'Decadent dark chocolate', 'price' => 3.75, 'image_url' => asset('images/chocolates/berry-burst.jpg')],
            ['id' => 5, 'name' => 'Ginger Zest', 'description' => 'Spicy ginger-flavored chocolate.', 'price' => 6.99, 'image_url' => asset('images/chocolates/ginger.jpg')],
            ['id' => 6, 'name' => 'Whiskey Velvet', 'description' => 'Velvety dark chocolate with a smooth touch of whiskey', 'price' => 4.00, 'image_url' => asset('images/chocolates/maple-dream.jpg')],
        ];
    }
}