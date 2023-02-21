<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WarehousesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouses')->insert([
            'branch_id' => '1',
            'warehouse' => 'cebu city 1',
            'particulars' => 'm. j. cuenco cebu city warehouse',
        ]);

        DB::table('warehouses')->insert([
            'branch_id' => '2',
            'warehouse' => 'WH4 - Tayud',
            'particulars' => 'Warehouse 4 - Tayud',
        ]);

        DB::table('warehouses')->insert([
            'branch_id' => '2',
            'warehouse' => 'WH3-Tayud',
            'particulars' => 'Warehouse 3 - Tayud',
        ]);

        DB::table('warehouses')->insert([
            'branch_id' => '3',
            'warehouse' => 'WH2-Hernan',
            'particulars' => 'Hernan',
        ]);

        DB::table('warehouses')->insert([
            'branch_id' => '4',
            'warehouse' => 'WH3-Tipolo',
            'particulars' => 'Warehouse 3 Tipolo',
        ]);
    }
}
