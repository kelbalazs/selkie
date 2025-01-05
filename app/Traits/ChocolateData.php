<?php

namespace App\Traits;

trait ChocolateData
{
    private function getChocolates()
    {
        return [
            ['id' => 1, 'name' => 'Cocoa Eclipse', 'description' => 'A bold, velvety dark chocolate crafted with a higher cocoa content for a deeper, more intense flavor.', 'price' => 4.00, 'image_url' => asset('images/chocolates/simple.jpg')],
            ['id' => 2, 'name' => 'Cocoa Shadow', 'description' => 'A creamy, smooth dark chocolate crafted for true indulgence', 'price' => 5.99, 'image_url' => asset('images/chocolates/simple.jpg')],
            ['id' => 3, 'name' => 'Honey Berry', 'description' => 'Rich dark chocolate paired with the sweet tangy of honeyberries.', 'price' => 6.99, 'image_url' => asset('images/chocolates/honeyberry.jpg')],
            ['id' => 4, 'name' => 'Silky Milk', 'description' => 'Luscious chocolate blended with the creaminess of coconut milk.', 'price' => 4.20, 'image_url' => asset('images/chocolates/cocomilk.jpg')],
            ['id' => 5, 'name' => 'Earl Grey', 'description' => 'Decadent dark chocolate infused with the elegance of Earl Grey tea', 'price' => 3.75, 'image_url' => asset('images/chocolates/earlgrey.jpg')],
            ['id' => 6, 'name' => 'Ginger Zest', 'description' => 'Bold dark chocolate with a zesty ginger kick for a spicy delight.', 'price' => 6.99, 'image_url' => asset('images/chocolates/ginger.jpg')],
        ];
        
    }
}