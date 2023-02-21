
@extends('layouts.app')

@section('content')
  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Receiving Item Summary Report</label></td>
        </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
            <td>
              <div>
                <label>Warehouse: {{ (blank($data)) ? '-' : $data[0]->warehouse_receiving->warehouse->warehouse }}</label><br><br>
                <label>Date Start: {{ $start }}</label><br><br>
                <label>Date End: {{ $end }}</label><br>
              </div>  
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
        </tr>
        <tr>
          <td>No</td>
          <td>RR No</td>
          <td>Batch No</td>
          <td>Expiry Date</td>
          <td>Mat. Code</td>
          <td>Mat. Desc</td>
          <td>UOM</td>
          <td>Total Qty</td>
          <td>Total Wt</td>
          <td>Total Vol</td>
          <td>Total Pallet</td>
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
        </tr>
      </thead>
      <tbody style="font-size: 12px;">
      @if(blank($data)) {}
        <tr>
          <td colspan="11" style="text-align: center">No Record Found</td>
        </tr>
      @else
        @foreach($data as $warehouse_receiving_item) <tr>
              <td> {{ $loop->index + 1 }} </td>
              <td> {{ $warehouse_receiving_item->warehouse_receiving->wr_number }} </td>
              <td> {{ $warehouse_receiving_item->batch_number }} </td>
              <td> {{ $warehouse_receiving_item->expiry_date }} </td>
              <td> {{ $warehouse_receiving_item->customer_material->material_type->code }} </td>
              <td> {{ $warehouse_receiving_item->customer_material->material_type->material_type }} </td>
              <td> {{ $warehouse_receiving_item->unit }} </td>
              <td> {{ $warehouse_receiving_item->quantity }} </td>
              <td> {{ number_format($warehouse_receiving_item->weight, 4)}} </td>
              <td> {{ number_format($warehouse_receiving_item->volume, 4)}}</td>
              <td> {{ round(($warehouse_receiving_item->weight / 1000), 2) }}</td>
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