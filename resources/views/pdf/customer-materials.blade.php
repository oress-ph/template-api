@extends('layouts.app')

@section('content')
<div style="width:100%; padding: 10px;">

<div style="display: block;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">List of Customer Materials</label></td>
        </tr>
        </thead>
    </table>

    <br />
    <label>Customer: {{ $customer_materials[0]->customer ? $customer_materials[0]->customer->customer : '-' }}</label><br>
    <label>Address: {{ $customer_materials[0]->customer ? $customer_materials[0]->customer->address : '-' }}</label><br>
    <label>Contact Person: {{ $customer_materials[0]->customer_contacts ? $customer_materials[0]->customer_contacts->contact_name : '-' }}</label><br>
    <label>Contact Number: {{ $customer_materials[0]->customer_contacts ? $customer_materials[0]->customer_contacts->contact_number : '-' }}</label><br>

    <table style="width: 100%;">
    <thead style="font-size: 14px;" class="table-list">
          <tr class="tr-head">
                    <th rowspan="2">Code</th>
                    <th rowspan="2">Material</th>
                    <th rowspan="2">Particulars</th>
                    <th rowspan="2">Mat. Type</th>
                    <th rowspan="2">Storage Type</th>
                    <th rowspan="2">Category</th>
                    <th colspan="8">Unit Conversions</th>
                    <th colspan="4">Volume (cm)</th>
                    <th rowspan="2">UPC</th>
                </tr>
                <tr>
                    <td>MU1</td>
                    <td>U1</td>
                    <td>MK1</td>
                    <td>K1</td>
                    <td>MU2</td>
                    <td>U2</td>
                    <td>MK2</td>
                    <td>K2</td>
                    <td>H</td>
                    <td>W</td>
                    <td>L</td>
                    <td>CCM</td>
                </tr>
                <tr class="border-dash">
                <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="border-dash">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody style="font-size: 12px;">
                @foreach($customer_materials as $customer_material)
                <tr>
                    <td>{{ $customer_material->code }}</td>
                    <td>{{ $customer_material->material }}</td>
                    <td>{{ $customer_material->particulars }}</td>
                    <td>{{ $customer_material->material_type ? $customer_material->material_type->material_type : '-' }}</td>
                    <td>{{ $customer_material->storage_type ? $customer_material->storage_type->storage_type : '-' }}</td>
                    <td>{{ $customer_material->material_category ? $customer_material->material_category->material_category : '-' }}</td>
                    <td>{{ $customer_material->unit1_multiplier }}</td>
                    <td>{{ $customer_material->unit1 }}</td>
                    <td>{{ $customer_material->kg1_multiplier }}</td>
                    <td>KGS</td>
                    <td>{{ $customer_material->unit2_multiplier }}</td>
                    <td>{{ $customer_material->unit2 }}</td>
                    <td>{{ $customer_material->kg2_multiplier }}</td>
                    <td>KGS</td>
                    <td>{{ $customer_material->height_cm }}</td>
                    <td>{{ $customer_material->width_cm }}</td>
                    <td>{{ $customer_material->length_cm }}</td>
                    <td>{{ $customer_material->ccm }}</td>
                    <td>{{ $customer_material->upc }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div style="position:absolute; bottom: 0; width: 100%;">

        <div style="display: flex;">
        <div style="margin-top: 20px;">
            <label for="document_no" style="float: left;">Document No. 2</label>
            <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
        </div>
        </div>

        </div>
    </div>
</div>
@endsection