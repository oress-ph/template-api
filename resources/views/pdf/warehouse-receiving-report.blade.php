@extends('layouts.app')

@section('content')
<div style="width: 100%;">
  <table style="width: 100%;">
    <thead>
      <tr>
        <td>
          <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100">
        </td>
        <td style="padding-left: 10rem;"><label style="font-size: 18px;">Warehouse Receiving Summary Report</label></td>
      </tr>
    </thead>
  </table>
  <hr>
  <table style="width: 100%;">
    <tbody style="font-size: 12px; ">
      <tr>
        <td>
          <div>
            <label>Date: {{ $start }}</label> <label>to</label> <label> {{ $end }} </label><br>
            <label>Warehouse: {{ $warehouse }}</label><br><br>
            <label>length: {{ $length }}</label><br><br>
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
      </tr>
      <tr>
        <td>RR No</td>
        <td>Customer</td>
        <td>Container Number</td>
        <td>Type</td>
        <td>Total Pallet</td>
        <td>Total Qty</td>
        <td>Total Weight</td>
        <td>Total Vol</td>
        <td>Status</td>
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
      </tr>
    </thead>
    <tbody style="font-size: 12px;">
      @if($length == 0)
      <tr>
        <td colspan="11" style="text-align: center">No Record Found</td>
      </tr>
      @else
      @foreach($data as $wr)
      <tr>
        <td> {{ $wr['wr_number'] }}</td>
        <td> {{ $wr['customer']  }}</td>
        <td> {{ $wr['container_number']  }}</td>
        <td> {{ $wr['type']  }}</td>
        <td> {{ $wr['total_number_of_pallets']  }}</td>
        <td> {{ $wr['total_quantity']  }}</td>
        <td> {{ $wr['total_weight']  }}</td>
        <td> {{ $wr['total_volume']  }}</td>
        <td> {{ $wr['status']  }}</td>
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