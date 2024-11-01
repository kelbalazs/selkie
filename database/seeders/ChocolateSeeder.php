<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chocolate;
use Faker\Factory as Faker;

class ChocolateSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $chocolateTypes = [
            'Dark Chocolate' => 'Rich and intense 70% cocoa dark chocolate with a smooth finish. Perfect for chocolate connoisseurs who appreciate deep, complex flavors.',
            'Milk Chocolate' => 'Creamy and smooth milk chocolate made with premium dairy. A classic favorite with a perfect balance of sweetness.',
            'White Chocolate' => 'Velvety white chocolate made with pure cocoa butter and Madagascar vanilla. Luxuriously sweet and creamy.',
            'Hazelnut Chocolate' => 'Milk chocolate blended with roasted Italian hazelnuts. A perfect combination of nutty crunch and smooth chocolate.',
            'Almond Chocolate' => 'Premium chocolate studded with carefully selected California almonds. Offers a delightful crunch with every bite.',
            'Caramel Chocolate' => 'Smooth milk chocolate filled with flowing caramel. Made with real butter and premium sea salt.',
            'Mint Chocolate' => 'Dark chocolate infused with natural peppermint oil. Refreshing and sophisticated with a cooling finish.',
            'Orange Chocolate' => 'Dark chocolate infused with natural orange essence. A zesty twist on classic chocolate.',
            'Berry Chocolate' => 'Dark chocolate with a medley of dried berries. Contains strawberries, raspberries, and blueberries.',
            'Sea Salt Chocolate' => 'Dark chocolate sprinkled with premium fleur de sel. A perfect balance of sweet and salty.',
            'Coffee Chocolate' => 'Dark chocolate infused with freshly ground arabica coffee beans. A rich and energizing treat.',
            'Matcha Chocolate' => 'White chocolate blended with premium Japanese matcha green tea. Unique and sophisticated flavor profile.'
        ];

        for ($i = 0; $i < 20; $i++) {
            $chocolateName = $faker->randomElement(array_keys($chocolateTypes));
            
            Chocolate::create([
                'name' => $chocolateName,
                'description' => $chocolateTypes[$chocolateName],
                'price' => $faker->randomFloat(2, 3, 10) // Generates a price between 3.00 and 10.00
            ]);
        }
    }
}