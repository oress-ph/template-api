<?php

namespace Database\Seeders;

use App\Models\SystemModule;
use Illuminate\Database\Seeder;

class SystemModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        SystemModule::create([
            'system_module' => 'Administration - Modules',
            'description' => 'Administration - Modules',
        ]);

        SystemModule::create([
            'system_module' => 'Administration - Users',
            'description' => 'Administration - Users',
        ]);

        SystemModule::create([
            'system_module' => 'Administration - User Detail',
            'description' => 'Administration - User Detail',
        ]);

        SystemModule::create([
            'system_module' => 'Administration - Companies',
            'description' => 'Administration - Companies',
        ]);

        SystemModule::create([
            'system_module' => 'Administration - Company Detail',
            'description' => 'Administration - Company Detail',
        ]);

        SystemModule::create([
            'system_module' => 'Administration - Branches',
            'description' => 'Administration - Branches',
        ]);

        SystemModule::create([
            'system_module' => 'Administration - Branch Detail',
            'description' => 'Administration - Branch Detail',
        ]);

        SystemModule::create([
            'system_module' => 'Administration - Storages',
            'description' => 'Administration - Storages',
        ]);

        SystemModule::create([
            'system_module' => 'Administration - Storages Detail',
            'description' => 'Administration - Storages Detail',
        ]);

        SystemModule::create([
            'system_module' => 'Administration - Materials',
            'description' => 'Administration - Materials',
        ]);

        SystemModule::create([
            'system_module' => 'Administration - Material Detail',
            'description' => 'Administration - Material Detail',
        ]);

        SystemModule::create([
            'system_module' => 'Administration - Selections',
            'description' => 'Administration - Selections',
        ]);

        SystemModule::create([
            'system_module' => 'Sales and Marketing - Customers',
            'description' => 'Sales and Marketing - Customers',
        ]);

        SystemModule::create([
            'system_module' => 'Sales and Marketing - Customer Detail',
            'description' => 'Sales and Marketing - Customer Detail',
        ]);

        SystemModule::create([
            'system_module' => 'Sales and Marketing - Rate Sheets',
            'description' => 'Sales and Marketing - Rate Sheets',
        ]);

        SystemModule::create([
            'system_module' => 'Sales and Marketing - Rate Sheet Detail',
            'description' => 'Sales and Marketing - Rate Sheet Detail',
        ]);

        SystemModule::create([
        'system_module' => 'Sales and Marketing - Reports   ',
        'description' => 'Sales and Marketing - Reports',
        ]);

        SystemModule::create([
            'system_module' => 'Sales and Marketing - Services',
            'description' => 'Sales and Marketing - Services',
        ]);

        SystemModule::create([
            'system_module' => 'Sales and Marketing - Service Detail',
            'description' => 'Sales and Marketing - Service Detail',
        ]);
        
    }
}
