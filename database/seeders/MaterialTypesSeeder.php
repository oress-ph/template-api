<?php

namespace Database\Seeders;

use App\Models\MaterialType;
use Illuminate\Database\Seeder;

class MaterialTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MaterialType::create([
            'code' => 'MT01',
            'material_type' => 'FRZ - Pork',
            'storage_type_id' => '1',
            'groupings' => 'FRZ1',
            'pallet_packaging' => 'WOODEN PALLET-FROZEN MEAT',
            'particulars' => 'FRZ - Pork',
        ]);

        MaterialType::create([
            'code' => 'MT02',
            'material_type' => 'FRZ - Beef',
            'storage_type_id' => '1',
            'groupings' => 'FRZ1',
            'pallet_packaging' => 'WOODEN PALLET-FROZEN MEAT',
            'particulars' => 'FRZ - Beef',
        ]);

        MaterialType::create([
            'code' => 'MT03',
            'material_type' => 'FRZ - Other Red Meets',
            'storage_type_id' => '1',
            'groupings' => 'FRZ1',
            'pallet_packaging' => 'WOODEN PALLET-FROZEN MEAT',
            'particulars' => 'FRZ - Other Red Meets',
        ]);

        MaterialType::create([
            'code' => 'MT04',
            'material_type' => 'FRZ - Poultry',
            'storage_type_id' => '1',
            'groupings' => 'FRZ2',
            'pallet_packaging' => 'WOODEN PALLET-FROZEN POULTRY',
            'particulars' => 'FRZ - Poultry',
        ]);

        MaterialType::create([
            'code' => 'MT05',
            'material_type' => 'FRZ - Marine',
            'storage_type_id' => '1',
            'groupings' => 'FRZ3',
            'pallet_packaging' => 'WOODEN PALLET- FROZEN MARINE',
            'particulars' => 'FRZ - Marine',
        ]);

        MaterialType::create([
            'code' => 'MT06',
            'material_type' => 'FRZ - Fruits & Vegetables',
            'storage_type_id' => '1',
            'groupings' => 'FRZ4',
            'pallet_packaging' => 'WOODEN PALLET - FROZEN FRUITS & VEG.',
            'particulars' => 'FRZ - Fruits & Vegetables',
        ]);

        MaterialType::create([
            'code' => 'MT07',
            'material_type' => 'FRZ - Processed Products',
            'storage_type_id' => '1',
            'groupings' => 'FRZ4',
            'pallet_packaging' => 'WOODEN PALLET - FROZEN PROCESSED',
            'particulars' => 'FRZ - Processed Products',
        ]);

        MaterialType::create([
            'code' => 'MT08',
            'material_type' => 'CHL - Pork',
            'storage_type_id' => '2',
            'groupings' => 'CHL1',
            'pallet_packaging' => 'WOODEN PALLET - CHILLED MEAT',
            'particulars' => 'CHL - Pork',
        ]);

        MaterialType::create([
            'code' => 'MT09',
            'material_type' => 'CHL - Beef',
            'storage_type_id' => '2',
            'groupings' => 'CHL1',
            'pallet_packaging' => 'WOODEN PALLET - CHILLED MEAT',
            'particulars' => 'CHL - Beef',
        ]);

        MaterialType::create([
            'code' => 'MT10',
            'material_type' => 'CHL - Other Red Meats',
            'storage_type_id' => '2',
            'groupings' => 'CHL1',
            'pallet_packaging' => 'WOODEN PALLET - CHILLED MEAT',
            'particulars' => 'CHL - Other Red Meats',
        ]);

        MaterialType::create([
            'code' => 'MT11',
            'material_type' => 'CHL - Poultry',
            'storage_type_id' => '2',
            'groupings' => 'CHL2',
            'pallet_packaging' => 'WOODEN PALLET - CHILLED POULTRY ',
            'particulars' => 'CHL - Poultry',
        ]);

        MaterialType::create([
            'code' => 'MT12',
            'material_type' => 'CHL - Marine',
            'storage_type_id' => '2',
            'groupings' => 'CHL3',
            'pallet_packaging' => 'WOODEN PALLET - CHILLED MARINE',
            'particulars' => 'CHL - Marine',
        ]);

        MaterialType::create([
            'code' => 'MT13',
            'material_type' => 'CHL - Fuits & Vegetables',
            'storage_type_id' => '2',
            'groupings' => 'CHL4',
            'pallet_packaging' => 'WOODEN PALLET - CHILLED FRUITS & VEG.',
            'particulars' => 'CHL - Fuits & Vegetables',
        ]);

        MaterialType::create([
            'code' => 'MT14',
            'material_type' => 'CHL - Processed Products',
            'storage_type_id' => '2',
            'groupings' => 'CHL5',
            'pallet_packaging' => 'WOODEN PALLET - CHILLED PROCESSED PRODUCTS',
            'particulars' => 'CHL - Processed Products',
        ]);

        MaterialType::create([
            'code' => 'MT15',
            'material_type' => 'CHL - Other Chilled Products',
            'storage_type_id' => '2',
            'groupings' => 'CHL5',
            'pallet_packaging' => 'WOODEN PALLET - OTHER CHILLED PRODUCTS',
            'particulars' => 'CHL - Other Chilled Products',
        ]);

        MaterialType::create([
            'code' => 'MT16',
            'material_type' => 'CLD - Fruits & Vegetables',
            'storage_type_id' => '3',
            'groupings' => 'CLD1',
            'pallet_packaging' => 'WOODEN PALLET - COLD FRUITS & VEG.',
            'particulars' => 'CLD - Fruits & Vegetables',
        ]);

        MaterialType::create([
            'code' => 'MT17',
            'material_type' => 'CLD - Processed Products',
            'storage_type_id' => '3',
            'groupings' => 'CLD2',
            'pallet_packaging' => 'WOODEN PALLET - COLD PROCESSED PROD.',
            'particulars' => 'CLD - Processed Products',
        ]);

        MaterialType::create([
            'code' => 'MT18',
            'material_type' => 'CLD - Other Cold Products',
            'storage_type_id' => '3',
            'groupings' => 'CLD3',
            'pallet_packaging' => 'WOODEN PALLET - COLD ASSORTED PROD.',
            'particulars' => 'CLD - Other Cold Products',
        ]);

        MaterialType::create([
            'code' => 'MT19',
            'material_type' => 'DRY - Fruits & Vegetables',
            'storage_type_id' => '4',
            'groupings' => 'DRY1',
            'pallet_packaging' => 'WOODEN PALLET - DRY FRUITS & VEG.',
            'particulars' => 'DRY - Fruits & Vegetables',
        ]);

        MaterialType::create([
            'code' => 'MT20',
            'material_type' => 'DRY - Processed Products',
            'storage_type_id' => '4',
            'groupings' => 'DRY2',
            'pallet_packaging' => 'WOODEN PALLET - DRY PROCESSED PROD.',
            'particulars' => 'DRY - Processed Products',
        ]);

        MaterialType::create([
            'code' => 'MT21',
            'material_type' => 'DRY - Other Dry Products',
            'storage_type_id' => '4',
            'groupings' => 'DRY3',
            'pallet_packaging' => 'WOODEN PALLET - OTHER DRY PRODUCTS',
            'particulars' => 'DRY - Other Dry Products',
        ]);


    }
}
