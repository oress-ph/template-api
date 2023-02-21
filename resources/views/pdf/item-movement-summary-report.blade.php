@extends('layouts.app')

@section('content')
  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Item Movement Summary Report</label></td>
        </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
            <td>
              <div>
                <label>Warehouse: {{ $inventory_item_transaction[0]->warehouse->warehouse }}</label><br>
                <label>Date Start: {{ $start }} </label>
                <label>Date End:  {{ $end }}</label><br>
              </div>  
          </td>
        </tr>
      </tbody>
    </table>

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
          <td>Tx No.</td>
          <td>Tx Date</td>
          <td>Mat. Code</td>
          <td>Material</td>
          <td>Customer</td>
          <td>Qty</td>
          <td>UOM</td>
          <td>Weight(kg)</td>
          <td>Batch No.</td>
          <td>Expiry</td>
          <td>Volume(cbm)</td>
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
      @foreach($inventory_item_transaction as $item)
        <tr>
          <td> {{ $item->inventory_number }}</td>
          <td> {{ $item->inventory_date }}</td>
          <td> {{ $item->inventory_item->customer_material->material_type->code }}</td>
          <td> {{ $item->inventory_item->customer_material->material }}</td>
          <td> {{ $item->inventory_item->customer->customer }}</td>
          <td> {{ $item->quantity }}</td>
          <td> {{ $item->unit }}</td>
          <td> {{ $item->weight }}</td>
          <td> {{ $item->inventory_item->batch_number }}</td>
          <td> {{ $item->expiry_date }}</td>
          <td> {{ $item->volume }}</td>
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
          </tr>
      </tbody>
    </table>
  </div>


<div style="position:absolute; bottom: 0; width: 100%;">

  <div style="display: flex;">
    <div style="margin-top: 20px;">
      <label for="document_no" style="float: left;">Document No. 22</label>
      <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
    </div>
  </div>

</div>

  @endsection