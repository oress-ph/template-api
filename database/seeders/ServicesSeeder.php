<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Services::create([
            'code' => '101-1',
            'service' => '1 KG',
            'service_group' => 'Freezer Storage-Weight',
            'customer_type' => 'Standard',
            'price' => '0.087',
            'status' => 'Active',
            'particulars' => 'Freezer Storage-Weight',
        ]);

        Services::create([
            'code' => '101-2',
            'service' => '1 KG',
            'service_group' => 'Freezer Storage-Weight',
            'customer_type' => 'Walk-in',
            'price' => '0.113',
            'status' => 'Active',
            'particulars' => 'Freezer Storage-Weight',
        ]);

        Services::create([
            'code' => '102-1',
            'service' => '1 PLT',
            'service_group' => 'Freezer Storage-Pallet',
            'customer_type' => 'Standard',
            'price' => '70',
            'status' => 'Active',
            'particulars' => 'Freezer Storage-Pallet',
        ]);

        Services::create([
            'code' => '102-2',
            'service' => '1 PLT',
            'service_group' => 'Freezer Storage-Pallet',
            'customer_type' => 'Walk-in',
            'price' => '91',
            'status' => 'Active',
            'particulars' => 'Freezer Storage-Pallet',
        ]);

        Services::create([
            'code' => '103-1',
            'service' => '1 CBM',
            'service_group' => 'Freezer Storage-Cubic',
            'customer_type' => 'Standard',
            'price' => '70',
            'status' => 'Active',
            'particulars' => 'Freezer Storage-Cubic',
        ]);

        Services::create([
            'code' => '103-2',
            'service' => '1 CBM',
            'service_group' => 'Freezer Storage-Cubic',
            'customer_type' => 'Walk-in',
            'price' => '91',
            'status' => 'Active',
            'particulars' => 'Freezer Storage-Cubic',
        ]);

        Services::create([
            'code' => '104-1',
            'service' => '1 KG',
            'service_group' => 'Chiller Storage-Weight',
            'customer_type' => 'Standard',
            'price' => '0.081',
            'status' => 'Active',
            'particulars' => 'Chiller Storage-Weight',
        ]);

        Services::create([
            'code' => '104-2',
            'service' => '1 KG',
            'service_group' => 'Chiller Storage-Weight',
            'customer_type' => 'Walk-in',
            'price' => '0.105',
            'status' => 'Active',
            'particulars' => 'Chiller Storage-Weight',
        ]);

        Services::create([
            'code' => '105-1',
            'service' => '1 PLT',
            'service_group' => 'Chiller Storage-Pallet',
            'customer_type' => 'Standard',
            'price' => '65',
            'status' => 'Active',
            'particulars' => 'Chiller Storage-Pallet',
        ]);

        Services::create([
            'code' => '105-2',
            'service' => '1 PLT',
            'service_group' => 'Chiller Storage-Pallet',
            'customer_type' => 'Walk-in',
            'price' => '84.5',
            'status' => 'Active',
            'particulars' => 'Chiller Storage-Pallet',
        ]);

        Services::create([
            'code' => '106-1',
            'service' => '1 CBM',
            'service_group' => 'Chiller Storage-Cubic',
            'customer_type' => 'Standard',
            'price' => '65',
            'status' => 'Active',
            'particulars' => 'Chiller Storage-Cubic',
        ]);

        Services::create([
            'code' => '106-2',
            'service' => '1 CBM',
            'service_group' => 'Chiller Storage-Cubic',
            'customer_type' => 'Walk-in',
            'price' => '84.5',
            'status' => 'Active',
            'particulars' => 'Chiller Storage-Cubic',
        ]);

        Services::create([
            'code' => '107-1',
            'service' => '1 KG',
            'service_group' => 'Cold Storage-Weight',
            'customer_type' => 'Standard',
            'price' => '0.075',
            'status' => 'Active',
            'particulars' => 'Cold Storage-Weight',
        ]);

        Services::create([
            'code' => '107-2',
            'service' => '1 KG',
            'service_group' => 'Cold Storage-Weight',
            'customer_type' => 'Walk-in',
            'price' => '0.098',
            'status' => 'Active',
            'particulars' => 'Cold Storage-Weight',
        ]);

        Services::create([
            'code' => '108-1',
            'service' => '1 PLT',
            'service_group' => 'Cold Storage-Pallet',
            'customer_type' => 'Standard',
            'price' => '60',
            'status' => 'Active',
            'particulars' => 'Cold Storage-Pallet',
        ]);

        Services::create([
            'code' => '108-2',
            'service' => '1 PLT',
            'service_group' => 'Cold Storage-Pallet',
            'customer_type' => 'Walk-in',
            'price' => '78',
            'status' => 'Active',
            'particulars' => 'Cold Storage-Pallet',
        ]);

        Services::create([
            'code' => '109-1',
            'service' => '1 CBM',
            'service_group' => 'Cold Storage-Cubic',
            'customer_type' => 'Standard',
            'price' => '60',
            'status' => 'Active',
            'particulars' => 'Cold Storage-Cubic',
        ]);

        Services::create([
            'code' => '109-2',
            'service' => '1 CBM',
            'service_group' => 'Cold Storage-Cubic',
            'customer_type' => 'Walk-in',
            'price' => '78',
            'status' => 'Active',
            'particulars' => 'Cold Storage-Cubic',
        ]);

        Services::create([
            'code' => '110-1',
            'service' => '1 KG',
            'service_group' => 'Dry Storage-Weight',
            'customer_type' => 'Standard',
            'price' => '0.03',
            'status' => 'Active',
            'particulars' => 'Dry Storage-Weight',
        ]);

        Services::create([
            'code' => '110-2',
            'service' => '1 KG',
            'service_group' => 'Dry Storage-Weight',
            'customer_type' => 'Walk-in',
            'price' => '0.039',
            'status' => 'Active',
            'particulars' => 'Dry Storage-Weight',
        ]);

        Services::create([
            'code' => '111-1',
            'service' => '1 PLT',
            'service_group' => 'Dry Storage-Pallet',
            'customer_type' => 'Standard',
            'price' => '24',
            'status' => 'Active',
            'particulars' => 'Dry Storage-Pallet',
        ]);

        Services::create([
            'code' => '111-2',
            'service' => '1 PLT',
            'service_group' => 'Dry Storage-Pallet',
            'customer_type' => 'Walk-in',
            'price' => '31.2',
            'status' => 'Active',
            'particulars' => 'Dry Storage-Pallet',
        ]);

        Services::create([
            'code' => '112-1',
            'service' => '1 CBM',
            'service_group' => 'Dry Storage-Cubic',
            'customer_type' => 'Standard',
            'price' => '24',
            'status' => 'Active',
            'particulars' => 'Dry Storage-Cubic',
        ]);

        Services::create([
            'code' => '112-2',
            'service' => '1 CBM',
            'service_group' => 'Dry Storage-Cubic',
            'customer_type' => 'Walk-in',
            'price' => '31.2',
            'status' => 'Active',
            'particulars' => 'Dry Storage-Cubic',
        ]);

        Services::create([
            'code' => '113-1',
            'service' => '1 KG',
            'service_group' => 'Crossdocking-Weight',
            'customer_type' => 'Standard',
            'price' => '0.5',
            'status' => 'Active',
            'particulars' => 'Crossdocking-Weight',
        ]);

        Services::create([
            'code' => '113-2',
            'service' => '1 KG',
            'service_group' => 'Crossdocking-Weight',
            'customer_type' => 'Walk-in',
            'price' => '0.65',
            'status' => 'Active',
            'particulars' => 'Crossdocking-Weight',
        ]);

        Services::create([
            'code' => '114-1',
            'service' => '1 PLT',
            'service_group' => 'Crossdocking-Pallet',
            'customer_type' => 'Standard',
            'price' => '400',
            'status' => 'Active',
            'particulars' => 'Crossdocking-Pallet',
        ]);

        Services::create([
            'code' => '114-2',
            'service' => '1 PLT',
            'service_group' => 'Crossdocking-Pallet',
            'customer_type' => 'Walk-in',
            'price' => '520',
            'status' => 'Active',
            'particulars' => 'Crossdocking-Pallet',
        ]);

        Services::create([
            'code' => '115-1',
            'service' => '1 CBM',
            'service_group' => 'Crossdocking-Cubic',
            'customer_type' => 'Standard',
            'price' => '400',
            'status' => 'Active',
            'particulars' => 'Crossdocking-Cubic',
        ]);

        Services::create([
            'code' => '115-2',
            'service' => '1 CBM',
            'service_group' => 'Crossdocking-Cubic',
            'customer_type' => 'Walk-in',
            'price' => '520',
            'status' => 'Active',
            'particulars' => 'Crossdocking-Cubic',
        ]);

        Services::create([
            'code' => '116-1',
            'service' => '1 KG',
            'service_group' => 'Handling In-Weight',
            'customer_type' => 'Standard',
            'price' => '0.15',
            'status' => 'Active',
            'particulars' => 'Handling In-Weight',
        ]);

        Services::create([
            'code' => '116-2',
            'service' => '1 KG',
            'service_group' => 'Handling In-Weight',
            'customer_type' => 'Walk-in',
            'price' => '0.195',
            'status' => 'Active',
            'particulars' => 'Handling In-Weight',
        ]);

        Services::create([
            'code' => '117-1',
            'service' => '1 PLT',
            'service_group' => 'Handling In-Pallet',
            'customer_type' => 'Standard',
            'price' => '120',
            'status' => 'Active',
            'particulars' => 'Handling In-Pallet',
        ]);

        Services::create([
            'code' => '117-2',
            'service' => '1 PLT',
            'service_group' => 'Handling In-Pallet',
            'customer_type' => 'Walk-in',
            'price' => '156',
            'status' => 'Active',
            'particulars' => 'Handling In-Pallet',
        ]);

        Services::create([
            'code' => '118-1',
            'service' => '1 CBM',
            'service_group' => 'Handling In-Cubic',
            'customer_type' => 'Standard',
            'price' => '120',
            'status' => 'Active',
            'particulars' => 'Handling In-Cubic',
        ]);

        Services::create([
            'code' => '118-2',
            'service' => '1 CBM',
            'service_group' => 'Handling In-Cubic',
            'customer_type' => 'Walk-in',
            'price' => '156',
            'status' => 'Active',
            'particulars' => 'Handling In-Cubic',
        ]);

        Services::create([
            'code' => '119-1',
            'service' => '1 KG',
            'service_group' => 'Handling Out-Weight',
            'customer_type' => 'Standard',
            'price' => '0.15',
            'status' => 'Active',
            'particulars' => 'Handling Out-Weight',
        ]);

        Services::create([
            'code' => '119-2',
            'service' => '1 KG',
            'service_group' => 'Handling Out-Weight',
            'customer_type' => 'Walk-in',
            'price' => '0.195',
            'status' => 'Active',
            'particulars' => 'Handling Out-Weight',
        ]);

        Services::create([
            'code' => '120-1',
            'service' => '1 PLT',
            'service_group' => 'Handling Out-Pallet',
            'customer_type' => 'Standard',
            'price' => '120',
            'status' => 'Active',
            'particulars' => 'Handling Out-Pallet',
        ]);

        Services::create([
            'code' => '120-2',
            'service' => '1 PLT',
            'service_group' => 'Handling Out-Pallet',
            'customer_type' => 'Walk-in',
            'price' => '156',
            'status' => 'Active',
            'particulars' => 'Handling Out-Pallet',
        ]);

        Services::create([
            'code' => '121-1',
            'service' => '1 CBM',
            'service_group' => 'Handling Out-Cubic',
            'customer_type' => 'Standard',
            'price' => '120',
            'status' => 'Active',
            'particulars' => 'Handling Out-Cubic',
        ]);

        Services::create([
            'code' => '121-2',
            'service' => '1 CBM',
            'service_group' => 'Handling Out-Cubic',
            'customer_type' => 'Walk-in',
            'price' => '156',
            'status' => 'Active',
            'particulars' => 'Handling Out-Cubic',
        ]);

        Services::create([
            'code' => '122-1',
            'service' => '1 KG',
            'service_group' => 'Freezing Services-Weight',
            'customer_type' => 'Standard',
            'price' => '3.5',
            'status' => 'Active',
            'particulars' => 'Freezing Services-Weight',
        ]);

        Services::create([
            'code' => '122-2',
            'service' => '1 KG',
            'service_group' => 'Freezing Services-Weight',
            'customer_type' => 'Walk-in',
            'price' => '4.55',
            'status' => 'Active',
            'particulars' => 'Freezing Services-Weight',
        ]);

        Services::create([
            'code' => '123-1',
            'service' => '1 KG',
            'service_group' => 'Chilling Services-Weight',
            'customer_type' => 'Standard',
            'price' => '2',
            'status' => 'Active',
            'particulars' => 'Chilling Services-Weight',
        ]);

        Services::create([
            'code' => '123-2',
            'service' => '1 KG',
            'service_group' => 'Chilling Services-Weight',
            'customer_type' => 'Walk-in',
            'price' => '2.6',
            'status' => 'Active',
            'particulars' => 'Chilling Services-Weight',
        ]);

        Services::create([
            'code' => '124-1',
            'service' => '1 KG',
            'service_group' => 'Cooling Services-Weight',
            'customer_type' => 'Standard',
            'price' => '1',
            'status' => 'Active',
            'particulars' => 'Cooling Services-Weight',
        ]);

        Services::create([
            'code' => '124-2',
            'service' => '1 KG',
            'service_group' => 'Cooling Services-Weight',
            'customer_type' => 'Walk-in',
            'price' => '1.3',
            'status' => 'Active',
            'particulars' => 'Cooling Services-Weight',
        ]);

        Services::create([
            'code' => '125-1',
            'service' => '1 VAN',
            'service_group' => 'Stripping/ Stuffing Reefer-40Ftr',
            'customer_type' => 'Standard',
            'price' => '1500',
            'status' => 'Active',
            'particulars' => 'Stripping/ Stuffing Reefer-40Ftr',
        ]);

        Services::create([
            'code' => '125-2',
            'service' => '1 VAN',
            'service_group' => 'Stripping/ Stuffing Reefer-40Ftr',
            'customer_type' => 'Walk-in',
            'price' => '1950',
            'status' => 'Active',
            'particulars' => 'Stripping/ Stuffing Reefer-40Ftr',
        ]);

        Services::create([
            'code' => '126-1',
            'service' => '1 VAN',
            'service_group' => 'Stripping/ Stuffing Reefer-20Ftr',
            'customer_type' => 'Standard',
            'price' => '1200',
            'status' => 'Active',
            'particulars' => 'Stripping/ Stuffing Reefer-20Ftr',
        ]);

        Services::create([
            'code' => '126-2',
            'service' => '1 VAN',
            'service_group' => 'Stripping/ Stuffing Reefer-20Ftr',
            'customer_type' => 'Walk-in',
            'price' => '1560',
            'status' => 'Active',
            'particulars' => 'Stripping/ Stuffing Reefer-20Ftr',
        ]);

        Services::create([
            'code' => '127-1',
            'service' => '1 VAN',
            'service_group' => 'Stripping/ Stuffing Dry-40Ftr',
            'customer_type' => 'Standard',
            'price' => '1500',
            'status' => 'Active',
            'particulars' => 'Stripping/ Stuffing Dry-40Ftr',
        ]);

        Services::create([
            'code' => '127-2',
            'service' => '1 VAN',
            'service_group' => 'Stripping/ Stuffing Dry-40Ftr',
            'customer_type' => 'Walk-in',
            'price' => '1950',
            'status' => 'Active',
            'particulars' => 'Stripping/ Stuffing Dry-40Ftr',
        ]);

        Services::create([
            'code' => '128-1',
            'service' => '1 VAN',
            'service_group' => 'Stripping/ Stuffing Dry-20Ft',
            'customer_type' => 'Standard',
            'price' => '1200',
            'status' => 'Active',
            'particulars' => 'Stripping/ Stuffing Dry-20Ft',
        ]);

        Services::create([
            'code' => '128-2',
            'service' => '1 VAN',
            'service_group' => 'Stripping/ Stuffing Dry-20Ft',
            'customer_type' => 'Walk-in',
            'price' => '1560',
            'status' => 'Active',
            'particulars' => 'Stripping/ Stuffing Dry-20Ft',
        ]);

        Services::create([
            'code' => '129-1',
            'service' => '1 Hour',
            'service_group' => 'Electrical Services-Plug-In 40Ftr/Hour',
            'customer_type' => 'Standard',
            'price' => '180',
            'status' => 'Active',
            'particulars' => 'Electrical Services-Plug-In 40Ftr/Hour',
        ]);

        Services::create([
            'code' => '129-2',
            'service' => '1 Hour',
            'service_group' => 'Electrical Services-Plug-In 40Ftr/Hour',
            'customer_type' => 'Walk-in',
            'price' => '234',
            'status' => 'Active',
            'particulars' => 'Electrical Services-Plug-In 40Ftr/Hour',
        ]);

        Services::create([
            'code' => '130-1',
            'service' => '1 Hour',
            'service_group' => 'Electrical Services-Plug-In 20Ftr/Hour',
            'customer_type' => 'Standard',
            'price' => '180',
            'status' => 'Active',
            'particulars' => 'Electrical Services-Plug-In 20Ftr/Hour',
        ]);

        Services::create([
            'code' => '130-2',
            'service' => '1 Hour',
            'service_group' => 'Electrical Services-Plug-In 20Ftr/Hour',
            'customer_type' => 'Walk-in',
            'price' => '234',
            'status' => 'Active',
            'particulars' => 'Electrical Services-Plug-In 20Ftr/Hour',
        ]);

        Services::create([
            'code' => '131-1',
            'service' => '1 Hour',
            'service_group' => 'Electrical Services- 1St Hour (Pre-Cooling)',
            'customer_type' => 'Standard',
            'price' => '1200',
            'status' => 'Active',
            'particulars' => 'Electrical Services- 1St Hour (Pre-Cooling)',
        ]);

        Services::create([
            'code' => '131-2',
            'service' => '1 Hour',
            'service_group' => 'Electrical Services- 1St Hour (Pre-Cooling)',
            'customer_type' => 'Walk-in',
            'price' => '1560',
            'status' => 'Active',
            'particulars' => 'Electrical Services- 1St Hour (Pre-Cooling)',
        ]);

        Services::create([
            'code' => '132-1',
            'service' => '1 VAN',
            'service_group' => 'Water Services-Van Cleaning',
            'customer_type' => 'Standard',
            'price' => '200',
            'status' => 'Active',
            'particulars' => 'Water Services-Van Cleaning',
        ]);

        Services::create([
            'code' => '132-2',
            'service' => '1 VAN',
            'service_group' => 'Water Services-Van Cleaning',
            'customer_type' => 'Walk-in',
            'price' => '260',
            'status' => 'Active',
            'particulars' => 'Water Services-Van Cleaning',
        ]);

        Services::create([
            'code' => '133-1',
            'service' => '1 Hour',
            'service_group' => 'Overtime Charges',
            'customer_type' => 'Standard',
            'price' => '70',
            'status' => 'Active',
            'particulars' => 'Overtime Charges',
        ]);

        Services::create([
            'code' => '133-2',
            'service' => '1 Hour',
            'service_group' => 'Overtime Charges',
            'customer_type' => 'Walk-in',
            'price' => '91',
            'status' => 'Active',
            'particulars' => 'Overtime Charges',
        ]);

        Services::create([
            'code' => '134-1',
            'service' => '1 Hour',
            'service_group' => 'Physical Count Charges',
            'customer_type' => 'Standard',
            'price' => '80',
            'status' => 'Active',
            'particulars' => 'Physical Count Charges',
        ]);

        Services::create([
            'code' => '134-2',
            'service' => '1 Hour',
            'service_group' => 'Physical Count Charges',
            'customer_type' => 'Walk-in',
            'price' => '104',
            'status' => 'Active',
            'particulars' => 'Physical Count Charges',
        ]);

        Services::create([
            'code' => '135-1',
            'service' => '1%',
            'service_group' => 'Administrative / Processing Fee(At Cost +30%)',
            'customer_type' => 'Standard',
            'price' => '1',
            'status' => 'Active',
            'particulars' => 'Administrative / Processing Fee(At Cost +30%)',
        ]);

        Services::create([
            'code' => '135-2',
            'service' => '1%',
            'service_group' => 'Administrative / Processing Fee(At Cost +30%)',
            'customer_type' => 'Walk-in',
            'price' => '1.3',
            'status' => 'Active',
            'particulars' => 'Administrative / Processing Fee(At Cost +30%)',
        ]);
    }
}