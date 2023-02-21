<?php

namespace Database\Seeders;

use App\Models\MaterialCategory;
use Illuminate\Database\Seeder;

class MaterialCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MaterialCategory::create([
            'code' => 'MC01',
            'material_category' => 'Raw Pork',
            'particulars' => 'Raw Pork',
        ]);

        MaterialCategory::create([
            'code' => 'MC02',
            'material_category' => 'Raw Beef',
            'particulars' => 'Raw Beef',
        ]);

        MaterialCategory::create([
            'code' => 'MC03',
            'material_category' => 'Other Red Meats',
            'particulars' => 'Other Red Meats',
        ]);

        MaterialCategory::create([
            'code' => 'MC04',
            'material_category' => 'Raw Poultry',
            'particulars' => 'Raw Poultry',
        ]);

        MaterialCategory::create([
            'code' => 'MC05',
            'material_category' => 'Raw Marine',
            'particulars' => 'Raw Marine',
        ]);

        MaterialCategory::create([
            'code' => 'MC06',
            'material_category' => 'Processed-Meat Based',
            'particulars' => 'Processed-Meat Based',
        ]);

        MaterialCategory::create([
            'code' => 'MC07',
            'material_category' => 'Processed-Non-Meat',
            'particulars' => 'Processed-Non-Meat',
        ]);

        MaterialCategory::create([
            'code' => 'MC08',
            'material_category' => 'Fruits, Veggies, Herbs, Spices',
            'particulars' => 'Fruits, Veggies, Herbs, Spices',
        ]);

        MaterialCategory::create([
            'code' => 'MC09',
            'material_category' => 'Dry - Food Products',
            'particulars' => 'Dry - Food Products',
        ]);

        MaterialCategory::create([
            'code' => 'MC10',
            'material_category' => 'Dry - Nonfood Products',
            'particulars' => 'Dry - Nonfood Products',
        ]);

        MaterialCategory::create([
            'code' => 'MC11',
            'material_category' => 'Dairy And Dairy Products',
            'particulars' => 'Dairy And Dairy Products',
        ]);

        MaterialCategory::create([
            'code' => 'MC12',
            'material_category' => 'Baked And Baker Products',
            'particulars' => 'Baked And Baker Products',
        ]);

        MaterialCategory::create([
            'code' => 'MC13',
            'material_category' => 'Liquors, Beverages And Liquids',
            'particulars' => 'Liquors, Beverages And Liquids',
        ]);

        MaterialCategory::create([
            'code' => 'MC14',
            'material_category' => 'Condemned',
            'particulars' => 'Condemned',
        ]);

    }

}