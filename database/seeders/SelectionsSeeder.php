<?php

namespace Database\Seeders;

use App\Models\Selection;
use Illuminate\Database\Seeder;

class SelectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Selection::create([
            'code' => '1',
            'value' => 'New',
            'category' => 'Customer Status',
            'particulars' => 'Sales Customers',
        ]);

        Selection::create([
            'code' => '2',
            'value' => 'Active',
            'category' => 'Customer Status',
            'particulars' => 'Sales Customers',
        ]);

        Selection::create([
            'code' => '3',
            'value' => 'Not Active',
            'category' => 'Customer Status',
            'particulars' => 'Sales Customers',
        ]);

        Selection::create([
            'code' => '4',
            'value' => 'Hold',
            'category' => 'Customer Status',
            'particulars' => 'Sales Customers',
        ]);

        Selection::create([
            'code' => '5',
            'value' => 'Active',
            'category' => 'Rate Sheet Status',
            'particulars' => 'Rate Sheet Status',
        ]);

        Selection::create([
            'code' => '6',
            'value' => 'Not Active',
            'category' => 'Rate Sheet Status',
            'particulars' => 'Rate Sheet Status',
        ]);

        Selection::create([
            'code' => '7',
            'value' => 'Active',
            'category' => 'Yards Loading Docks Status',
            'particulars' => 'Yards Loading Docks',
        ]);

        Selection::create([
            'code' => '8',
            'value' => 'Not Active',
            'category' => 'Yards Loading Docks Status',
            'particulars' => 'Yards Loading Docks',
        ]);

        Selection::create([
            'code' => '9',
            'value' => 'Active',
            'category' => 'Yards Plugin Stations Status',
            'particulars' => 'Yards Plugin Stations',
        ]);

        Selection::create([
            'code' => '10',
            'value' => 'Not Active',
            'category' => 'Yards Plugin Stations Status',
            'particulars' => 'Yards Plugin Stations',
        ]);

        Selection::create([
            'code' => '11',
            'value' => 'Open',
            'category' => 'Yards Truck Request Status',
            'particulars' => 'Yards Truck Request',
        ]);

        Selection::create([
            'code' => '12',
            'value' => 'Cancelled',
            'category' => 'Yards Truck Request Status',
            'particulars' => 'Yards Truck Request',
        ]);

        Selection::create([
            'code' => '13',
            'value' => 'Closed',
            'category' => 'Yards Truck Request Status',
            'particulars' => 'Yards Truck Request',
        ]);

        Selection::create([
            'code' => '14',
            'value' => 'Arrived',
            'category' => 'Yards Truck Arrival Status',
            'particulars' => 'Yards Truck Arrival',
        ]);

        Selection::create([
            'code' => '15',
            'value' => 'Plugged-in',
            'category' => 'Yards Truck Arrival Status',
            'particulars' => 'Yards Truck Arrival',
        ]);

        Selection::create([
            'code' => '16',
            'value' => 'Departed',
            'category' => 'Yards Truck Arrival Status',
            'particulars' => 'Yards Truck Arrival',
        ]);

        Selection::create([
            'code' => '17',
            'value' => 'Open',
            'category' => 'Receiving Status',
            'particulars' => 'Receiving Status',
        ]);

        Selection::create([
            'code' => '18',
            'value' => 'Close',
            'category' => 'Receiving Status',
            'particulars' => 'Receiving Status',
        ]);

        Selection::create([
            'code' => '19',
            'value' => 'Cancelled',
            'category' => 'Receiving Status',
            'particulars' => 'Receiving Status',
        ]);

        Selection::create([
            'code' => '20',
            'value' => 'Open',
            'category' => 'Receiving Pallets Status',
            'particulars' => 'Receiving Pallets',
        ]);

        Selection::create([
            'code' => '21',
            'value' => 'Closed',
            'category' => 'Receiving Pallets Status',
            'particulars' => 'Receiving Pallets',
        ]);

        Selection::create([
            'code' => '22',
            'value' => 'Checked',
            'category' => 'Receiving Pallets Status',
            'particulars' => 'Receiving Pallets',
        ]);

        Selection::create([
            'code' => '23',
            'value' => 'Open',
            'category' => 'Receiving Pallet Items Status',
            'particulars' => 'Receiving Pallet Items',
        ]);

        Selection::create([
            'code' => '24',
            'value' => 'Close',
            'category' => 'Receiving Pallet Items Status',
            'particulars' => 'Receiving Pallet Items',
        ]);

        Selection::create([
            'code' => '25',
            'value' => 'Active',
            'category' => 'Service Status',
            'particulars' => 'Customer Service',
        ]);

        Selection::create([
            'code' => '26',
            'value' => 'Not Active',
            'category' => 'Service Status',
            'particulars' => 'Customer Service',
        ]);

        Selection::create([
            'code' => '27',
            'value' => 'Walk-in',
            'category' => 'Customer Type',
            'particulars' => 'Customer Type',
        ]);

        Selection::create([
            'code' => '28',
            'value' => 'Standard',
            'category' => 'Customer Type',
            'particulars' => 'Customer Type',
        ]);

        Selection::create([
            'code' => '29',
            'value' => 'Traders',
            'category' => 'Nature of Business',
            'particulars' => 'Nature of Business',
        ]);

        Selection::create([
            'code' => '30',
            'value' => 'Manufacturing',
            'category' => 'Nature of Business',
            'particulars' => 'Nature of Business',
        ]);

        Selection::create([
            'code' => '31',
            'value' => 'Retail',
            'category' => 'Nature of Business',
            'particulars' => 'Nature of Business',
        ]);

        Selection::create([
            'code' => '32',
            'value' => 'Philippines',
            'category' => 'Country',
            'particulars' => 'Country',
        ]);

        Selection::create([
            'code' => '33',
            'value' => '15 Days',
            'category' => 'Terms',
            'particulars' => 'Terms of Payment',
        ]);

        Selection::create([
            'code' => '34',
            'value' => '30 Days',
            'category' => 'Terms',
            'particulars' => 'Terms of Payment',
        ]);

        Selection::create([
            'code' => '35',
            'value' => '00 Days',
            'category' => 'Terms',
            'particulars' => 'Terms of Payment',
        ]);

        Selection::create([
            'code' => '36',
            'value' => '20 Days',
            'category' => 'Terms',
            'particulars' => 'Terms of Payment',
        ]);

        Selection::create([
            'code' => '37',
            'value' => 'Customer Contact Email Option',
            'category' => 'Customer Contact Email Option',
            'particulars' => 'Customer Contact Email Option',
        ]);

        Selection::create([
            'code' => '38',
            'value' => 'Sales Staff',
            'category' => 'User Type',
            'particulars' => 'User Type',
        ]);

        Selection::create([
            'code' => '39',
            'value' => 'Admin',
            'category' => 'User Type',
            'particulars' => 'User Type',
        ]);

        Selection::create([
            'code' => '40',
            'value' => 'Inventory Analyst',
            'category' => 'User Type',
            'particulars' => 'User Type',
        ]);

        Selection::create([
            'code' => '41',
            'value' => 'Variable',
            'category' => 'Material Classification',
            'particulars' => 'Material Classification',
        ]);

        Selection::create([
            'code' => '42',
            'value' => 'Fixed',
            'category' => 'Material Classification',
            'particulars' => 'Material Classification',
        ]);

        Selection::create([
            'code' => '43',
            'value' => 'Box',
            'category' => 'UOM',
            'particulars' => 'Unit',
        ]);

        Selection::create([
            'code' => '44',
            'value' => 'Pcs',
            'category' => 'UOM',
            'particulars' => 'Unit',
        ]);

        Selection::create([
            'code' => '45',
            'value' => 'Pack',
            'category' => 'UOM',
            'particulars' => 'Unit of Measure',
        ]);

        Selection::create([
            'code' => '46',
            'value' => 'Sack',
            'category' => 'UOM',
            'particulars' => 'Unit of Measure',
        ]);

        Selection::create([
            'code' => '47',
            'value' => 'Bottle',
            'category' => 'UOM',
            'particulars' => 'Unit of Measure',
        ]);

        Selection::create([
            'code' => '48',
            'value' => 'Drum',
            'category' => 'UOM',
            'particulars' => 'Unit of Measure',
        ]);

        Selection::create([
            'code' => '49',
            'value' => 'Pallet',
            'category' => 'UOM',
            'particulars' => 'Unit of Measure',
        ]);

        Selection::create([
            'code' => '50',
            'value' => 'Bag',
            'category' => 'UOM',
            'particulars' => 'Unit of Measure',
        ]);

        Selection::create([
            'code' => '51',
            'value' => 'Tray',
            'category' => 'UOM',
            'particulars' => 'Unit of Measure',
        ]);

        Selection::create([
            'code' => '52',
            'value' => 'Crate',
            'category' => 'UOM',
            'particulars' => 'Unit of Measure',
        ]);

        Selection::create([
            'code' => '53',
            'value' => 'Case',
            'category' => 'UOM',
            'particulars' => 'Unit of Measure',
        ]);

        Selection::create([
            'code' => '54',
            'value' => 'Pail',
            'category' => 'UOM',
            'particulars' => 'Unit of Measure',
        ]);

        Selection::create([
            'code' => '55',
            'value' => 'Block',
            'category' => 'UOM',
            'particulars' => 'Unit of Measure',
        ]);

        Selection::create([
            'code' => '56',
            'value' => 'Bar',
            'category' => 'UOM',
            'particulars' => 'Unit of Measure',
        ]);

        Selection::create([
            'code' => '57',
            'value' => 'Cylinder',
            'category' => 'UOM',
            'particulars' => 'Unit of Measure',
        ]);

        Selection::create([
            'code' => '58',
            'value' => 'Freezer Storage-Weight',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '59',
            'value' => 'Freezer Storage-Pallet',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '60',
            'value' => 'Freezer Storage-Cubic',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '61',
            'value' => 'Chiller Storage-Weight',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '62',
            'value' => 'Chiller Storage-Pallet',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '63',
            'value' => 'Chiller Storage-Cubic',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '64',
            'value' => 'Cold Storage-Weight',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '65',
            'value' => 'Cold Storage-Pallet',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '66',
            'value' => 'Cold Storage-Cubic',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '67',
            'value' => 'Dry Storage-Weight',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '68',
            'value' => 'Dry Storage-Pallet',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '69',
            'value' => 'Dry Storage-Cubic',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '70',
            'value' => 'Crossdocking-Weight',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '71',
            'value' => 'Crossdocking-Cubic',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '72',
            'value' => 'Crossdocking-Pallet',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '73',
            'value' => 'Handling In-Weight',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '74',
            'value' => 'Handling In-Pallet',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '75',
            'value' => 'Handling In-Cubic',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '76',
            'value' => 'Handling Out-Weight',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '77',
            'value' => 'Handling Out-Pallet',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '78',
            'value' => 'Handling Out-Cubic',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '79',
            'value' => 'Freezing Services-Weight',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '80',
            'value' => 'Chilling Services-Weight',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '81',
            'value' => 'Cooling Services-Weight',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '82',
            'value' => 'Stripping/ Stuffing Reefer-40Ftr',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '83',
            'value' => 'Stripping/ Stuffing Reefer-20Ftr',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '84',
            'value' => 'Stripping/ Stuffing Dry-40Ftr',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '85',
            'value' => 'Stripping/ Stuffing Dry-20Ft',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '86',
            'value' => 'Electrical Services-Plug-In 40Ftr/Hour',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '87',
            'value' => 'Electrical Services-Plug-In 20Ftr/Hour',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '88',
            'value' => 'Electrical Services- 1St Hour (Pre-Cooling)',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '89',
            'value' => 'Overtime Charges',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '90',
            'value' => 'Water Services-Van Cleaning',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '91',
            'value' => 'Physical Count Charges',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);

        Selection::create([
            'code' => '92',
            'value' => 'Administrative / Processing Fee(At Cost +30%)',
            'category' => 'Service Group',
            'particulars' => 'Service Group',
        ]);
    }
}
