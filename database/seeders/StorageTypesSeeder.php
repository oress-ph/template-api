<?php

namespace Database\Seeders;

use App\Models\StorageType;
use Illuminate\Database\Seeder;

class StorageTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StorageType::create([
            'code' => 'ST01',
            'storage_type' => 'Freezer',
            'particulars' => '(-18°C to-20°C)',
        ]);

        StorageType::create([
            'code' => 'ST02',
            'storage_type' => 'Chiller',
            'particulars' => '(+0°C to +4°C)',
        ]);

        StorageType::create([
            'code' => 'ST03',
            'storage_type' => 'Cold',
            'particulars' => '(+15°C to +18°C)',
        ]);

        StorageType::create([
            'code' => 'ST04',
            'storage_type' => 'Dry',
            'particulars' => 'Ambient',
        ]);


    }
}