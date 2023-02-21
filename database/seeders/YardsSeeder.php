<?php

namespace Database\Seeders;

use App\Models\Yard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class YardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('yards')->insert([
            'branch_id' => '2',
            'yard' => 'CY2',
            'particulars' => 'Container Yard 2',
        ]);

        DB::table('yards')->insert([
            'branch_id' => '2',
            'yard' => 'CY1',
            'particulars' => 'Container Yard 1',
        ]);

        DB::table('yards')->insert([
            'branch_id' => '3',
            'yard' => 'CY1',
            'particulars' => 'Container Yard 1',
        ]);

        DB::table('yards')->insert([
            'branch_id' => '4',
            'yard' => 'CY1',
            'particulars' => 'Container Yard 1',
        ]);
    }
}
