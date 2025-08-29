<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuSection;

class MenuSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // All the menu sections from the GHOUSIA menu
        MenuSection::create(['name' => 'GHOUSIA KARAHI']);
        MenuSection::create(['name' => 'BAR B QUE PLATTER']);
        MenuSection::create(['name' => 'BAR B QUE HALF PLATTER']);
        MenuSection::create(['name' => 'KULFI']);
        MenuSection::create(['name' => 'DESSERT']);
        MenuSection::create(['name' => 'ICE CREAM']);
        MenuSection::create(['name' => 'MILK SHAKES']);
        MenuSection::create(['name' => 'EXTRAS']);
        MenuSection::create(['name' => 'GRILL CHARGHA']);
        MenuSection::create(['name' => 'FAST FOOD']);
        MenuSection::create(['name' => 'CHINESE FOOD']);
        MenuSection::create(['name' => 'PASTA']);
        MenuSection::create(['name' => 'BAR B QUE']);
        MenuSection::create(['name' => 'BEEF ROLL']);
        MenuSection::create(['name' => 'CHICKEN ROLL']);
        MenuSection::create(['name' => 'JUMBO BEEF ROLL']);
        MenuSection::create(['name' => 'JUMBO CHICKEN ROLL']);
        MenuSection::create(['name' => 'CHARGHA MANDI']);
        MenuSection::create(['name' => 'GHOUSIA SPECIAL KATAKAT']);
    }
}
