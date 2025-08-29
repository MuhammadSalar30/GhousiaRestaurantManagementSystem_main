<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        // Sample items from GHOUSIA KARAHI section
        MenuItem::create([
            'menu_section_id' => 1, // GHOUSIA KARAHI
            'name' => 'Chicken Handi Full',
            'price' => 2800,
            'description' => 'Delicious chicken handi full portion',
            'image' => null
        ]);

        MenuItem::create([
            'menu_section_id' => 1, // GHOUSIA KARAHI
            'name' => 'Chicken Handi Half',
            'price' => 1400,
            'description' => 'Delicious chicken handi half portion',
            'image' => null
        ]);

        // Sample items from FAST FOOD section
        MenuItem::create([
            'menu_section_id' => 10, // FAST FOOD
            'name' => 'Zinger Burger',
            'price' => 500,
            'description' => 'Crispy zinger burger',
            'image' => null
        ]);

        MenuItem::create([
            'menu_section_id' => 10, // FAST FOOD
            'name' => 'Zinger Cheese Burger',
            'price' => 550,
            'description' => 'Zinger burger with cheese',
            'image' => null
        ]);

        // Sample items from ICE CREAM section
        MenuItem::create([
            'menu_section_id' => 6, // ICE CREAM
            'name' => 'Pista Ice Cream',
            'price' => 200,
            'description' => 'Single scoop pista ice cream',
            'image' => null
        ]);

        MenuItem::create([
            'menu_section_id' => 6, // ICE CREAM
            'name' => 'Vanilla Ice Cream',
            'price' => 200,
            'description' => 'Single scoop vanilla ice cream',
            'image' => null
        ]);
    }
}
