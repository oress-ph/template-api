
@extends('layouts.app')

@section('content')
  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Receiving Item Aging Report</label></td>
        </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
            <td>
              <div>
                <label>Customer: {{ blank($warehouse_receiving) ? ' - ' : $warehouse_receiving[0]->customer->customer }}</label><br><br>
                <label>Warehouse: {{ blank($warehouse_receiving) ? ' - ' : $warehouse_receiving[0]->warehouse->warehouse }}</label><br><br>
                <label>As of Date: {{ blank($warehouse_receiving) ? ' - ' :  $warehouse_receiving[0]->wr_date }}</label><br><br>
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
          <td>RR No</td>
          <td>Batch No</td>
          <td>Expiry   Date</td>
          <td>Mat Code</td>
          <td>Mat Desc</td>
          <td>0-15 Days Qty|Kg</td>
          <td>16-30 Days Qty|Kg</td>
          <td>61-90 Days Qty|Kg</td>
          <td>90 Days Qty|Kg</td>
          <td>Total Qty|Kg</td>
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
      
      @if(blank($warehouse_receiving)) {}
        <tr>
          <td colspan="10" style="text-align: center">No Record Found</td>
        </tr>
      @else
        @foreach($warehouse_receiving as $wr)
            @foreach($wr->warehouse_receiving_items as $items)
              <tr>
                <td>{{$items->wr_id}}</td>
                <td>{{$items->batch_number}}</td>
                <td>{{$items->expiry_date}}</td>
                <td>{{$items->customer_material->code}}</td>
                <td>{{$items->customer_material->material}}</td>
                <td>1 | 20kg</td>
                <td>1 | 20kg</td>
                <td>1 | 20kg</td>
                <td>1 | 20kg</td>
                <td>4 | 800kg</td>
              </tr>
            @endforeach 
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
      <label for="document_no" style="float: left;">Document No. 17</label>
      <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
    </div>
  </div>

</div>

  @endsection