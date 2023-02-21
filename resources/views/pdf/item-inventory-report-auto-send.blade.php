@extends('layouts.app')

@section('content')
@php ($count = 2)
@foreach($datas as $data)
    <div style="width: 100%;">
        <table style="width: 100%;">
            <thead>
            <tr>
                <td>
                <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
                <td style="padding-left: 10rem;"><label style="font-size: 18px;">Item Inventory Report</label></td>
            </tr>
            </thead>
        </table>
        <hr>
        @if(blank($data['data']))
        <table style="width: 100%;">
            <tbody style="font-size: 12px; ">
            <tr>
                <td style="text-align: center;">
                    No Records Found 
                </td>
            </tr>
            </tbody>
        </table>
        @else
        <table style="width: 100%;">
            <tbody style="font-size: 12px; ">
            <tr>
                <td>
                    <label> Customer: {{ $customer }} </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label> Warehouse: {{ $data['warehouse'][0] }} </label>
                </td>
            </tr>
            <tr>
                <td>
                    <label> Current Date:  {{ DATE("m/d/Y",strtotime(now())) }} </label>
                </td>
            </tr>
            </tbody>
        </table>
        <br>
        <table style="width: 100%;">
            <thead style="font-size: 14px;" class="table-list">
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
            </tr>
            <tr>
                <td>Batch No.</td>
                <td>Expiry Date</td>
                <td>Storage Type</td>
                <td>Storage Bin</td>
                <td>Pal. No.</td>
                <td>Avail <br>Qty</td>
                <td><br/>Weight</td>
                <td>PA <br>Qty</td>
                <td><br/>Weight</td>
                <td>PL <br>Qty</td>
                <td><br />Weight</td>
                <td>Total <br>Qty</td>
                <td><br>Weight</td>
                <td>WR Date</td>
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
            </tr>
            </thead>
            <tbody style="font-size: 12px;">
            @foreach($data['data'] as $item)
            <tr>
                <td>{{ $item['batch_number'] }}</td>
                <td>{{ $item['expiry_date'] }}</td>
                <td>{{ $item['storage_type'] }}</td>
                <td>{{ $item['storage_bin_number'] }}</td>
                <td>{{ $item['pallet_number'] }}</td>
                <td>{{ $item['available_qty'] }}</td>
                <td>{{ $item['available_weight'] }}</td>
                <td>{{ $item['put_away_qty'] }}</td>
                <td>{{ $item['put_away_weight'] }}</td>
                <td>{{ $item['pick_list_qty'] }}</td>
                <td>{{ $item['pick_list_weight'] }}</td>
                <td>{{ $item['total_qty'] }}</td>
                <td>{{ $item['total_weight'] }}</td>
                <td>{{ $item['wr_date'] }}</td>
            </tr>
            @endforeach
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
                </tr>
            </tbody>
        </table>
        @endif
        
        
    </div>


    <div style="position:absolute; bottom: 0; width: 100%;">

    <div style="display: flex;">
        <div style="margin-top: 20px;">
        <label for="document_no" style="float: left;">Document No. 22</label>
        <label for="document_no" style="float: right;">Date Printed: {{ DATE("m/d/Y",strtotime(now())) }}</label>
        </div>
    </div>

    </div>
    @if($count<=count($datas))
      @php ($count++)
    <div style="page-break-inside:avoid; page-break-after:always;"></div>
    @endif
@endforeach
@endsection