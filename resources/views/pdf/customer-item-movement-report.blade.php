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
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Customer Item Movement Report</label></td>
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
                <label>Customer: {{$customer}}</label>
            </td>
            <td>
                <label>Warehouse: {{ $data['warehouse'][0] }}</label>
            </td>
        </tr>
        <tr>
            <td>
                <label>Address: {{$address}}</label>
            </td>
            <td>
                <label>Start Date: {{ DATE("m/d/Y",strtotime($start_date)) }} </label>
            </td>
            <td>
                <label>End Date: {{ DATE("m/d/Y",strtotime(now())) }} </label>
            </td>
        </tr>
        <tr>
            <td>
                <label>Email: {{$email}}</label>
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
            </tr>
            <tr>
                <td>Material Code</td>
                <td>Material</td>
                <td>Begining <br>Qty</td>
                <td><br/>Weight</td>
                <td>Receipts <br>Qty</td>
                <td><br/>Weight</td>
                <td>Issues <br>Qty</td>
                <td><br />Weight</td>
                <td>Ending <br>Qty</td>
                <td><br>Weight</td>
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
            </tr>
            </thead>
            <tbody style="font-size: 12px;">
            @foreach($data['data'] as $item)
            <tr>
                <td>{{ $item['material_code'] }}</td>
                <td>{{ $item['material'] }}</td>
                <td>{{ $item['begin_qty'] }}</td>
                <td>{{ $item['begin_weight'] }}</td>
                <td>{{ $item['receipts_qty'] }}</td>
                <td>{{ $item['receipts_weight'] }}</td>
                <td>{{ $item['issues_qty'] }}</td>
                <td>{{ $item['issues_weight'] }}</td>
                <td>{{ $item['ending_qty'] }}</td>
                <td>{{ $item['ending_weight'] }}</td>
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
            </tr>
            <tr>
            <td colspan="2">
                    <label>Total => </label>
                </td>
                <td>{{ $data['total_weight']['total_begin_qty'] }}</td>
                <td>{{ $data['total_weight']['total_begin_weight'] }}</td>
                <td>{{ $data['total_weight']['total_receipts_qty'] }}</td>
                <td>{{ $data['total_weight']['total_receipts_weight'] }}</td>
                <td>{{ $data['total_weight']['total_issues_qty'] }}</td>
                <td>{{ $data['total_weight']['total_issues_weight'] }}</td>
                <td>{{ $data['total_weight']['total_ending_qty'] }}</td>
                <td>{{ $data['total_weight']['total_ending_weight'] }}</td>
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
    @if($count<=count($datas))
      @php ($count++)
    <div style="page-break-inside:avoid; page-break-after:always;"></div>
    @endif
  </div>
@endforeach
@endsection