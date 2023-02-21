
@extends('layouts.app')

@section('content')
  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Picking List Summary Report </label></td>
        </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
            <td>
              <div>
                <label>Customer: {{ blank($data['pick_list']) ? '-' : $data['pick_list']['customer_name']}}</label><br><br>
                <label>Dispatch Number: {{ blank($data['pick_list']) ? '-' : $data['pick_list']['dr_number']}} </label><br><br>
                <label>Picking List Number: {{ blank($data['pick_list']) ? '-' : $data['pick_list']['pick_list_number']}} </label><br>
              </div>  
            </td>
            <td>
              <div>
                <label>Date Created: {{ blank($data['pick_list']) ? '-' : $data['pick_list']['date_created']}} </label><br><br>
                <label>Created By:  {{ blank($data['pick_list']) ? '-' : $data['pick_list']['created_by']}} </label><br><br>
              </div>  
            </td>
        </tr>
      </tbody>
    </table>
    <br>
    <br>
    <table style="width: 100%;">
      <thead style="font-size: 12px;" class="table-list">
        <tr>
          <td>Bin Location</td>
          <td>Pallet Number</td>
          <td>Material Code</td>
          <td>Material Desc</td>
          <td>Date Expiry</td>
          <td>Batch Number</td>
          <td>Quantity</td>
          <td>UoM</td>
          <td>Weight</td>
          <td>Remarks</td>
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
        @php 
          $total_weight = 0;
          $total_quantity = 0;
        @endphp
        @if(blank($data['pick_list']) || blank($data['items']))
        <tr>
          <td colspan="13" style="text-align: center">No Record Found</td>
        </tr>
        @else
          @foreach($data['items'] as $item) 
          <tr>
            <td>{{ $item['bin_location'] }}</td>
            <td>{{ $item['pallet_number'] }} </td>
            <td>{{ $item['customer_code'] }}  </td>
            <td>{{ $item['material_desc'] }} </td>
            <td>{{ $item['expiry_date'] }}</td>
            <td>{{ $item['batch_number']}}</td>
            @php
                $total_quantity += $item['quantity'];
                $total_weight += $item['weight'];
            @endphp
            <td>{{ $item['quantity']}}</td>
            <td>{{ $item['unit']}}</td>
            <td>{{ number_format($item['weight'], 4, '.', '') }}</td>
            <td>{{ $item['remarks']}}</td>
          </tr>
          @endforeach
        @endif
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
          <td colspan="6">Total => </td>
          <td> {{ $total_quantity }}</td>
          <td></td>
          <td>{{ number_format($total_weight, 4, '.', '') }} </td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <br>
  </div>

<div style="position:absolute; bottom: 0; width: 100%;">

  <div style="display: flex;">
    <div style="margin-top: 20px;">
      <label for="document_no" style="float: left;">Document No. 1</label>
      <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
    </div>
  </div>

</div>

  @endsection