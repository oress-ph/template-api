<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BranchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([
            'company_id' => '1',
            'branch' => 'Cebu City',
            'address' => 'M.J. Cuenco Ave., Cebu City',
            'contact_person' => 'Nilo Nadela',
            'contact_number' => '0908202681'
        ]);

        DB::table('branches')->insert([
            'company_id' => '1',
            'branch' => 'TAYUD',
            'address' => 'Tayud, Liloan, Cebu',
            'contact_person' => 'Nilo Nadela',
            'contact_number' => '09652545001'
        ]);

        DB::table('branches')->insert([
            'company_id' => '1',
            'branch' => 'HERNAN',
            'address' => 'Hernan St., Mandaue City',
            'contact_person' => 'Nilo Nadela',
            'contact_number' => '09652545001'
        ]);

        DB::table('branches')->insert([
            'company_id' => '1',
            'branch' => 'TIPOLO',
            'address' => 'Sacris Road Extension, Tipolo, Mandaue City',
            'contact_person' => 'Nilo Nadela',
            'contact_number' => '09652545001'
        ]);
    }
}
