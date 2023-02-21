<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
            CompanySeeder::class,
            BranchesSeeder::class,
            WarehousesSeeder::class,
            YardsSeeder::class,
            UserSeeder::class,
            SystemModulesSeeder::class,
            SelectionsSeeder::class,
            UserRightsSeeder::class,
            StorageTypesSeeder::class,
            ServicesSeeder::class,
            MaterialTypesSeeder::class,
            MaterialCategoriesSeeder::class,
       ]);
    }
}
