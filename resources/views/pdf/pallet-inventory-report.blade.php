@extends('layouts.app')

@section('content')
<div style="width: 100%;">
  <table style="width: 100%;">
    <thead>
      <tr>
        <td>
          <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100">
        </td>
        <td style="padding-left: 10rem;"><label style="font-size: 18px;">Pallet Inventory Report</label></td>
      </tr>
    </thead>
  </table>
  <hr>
  @if(blank($data))
  <table style="width: 100%;">
    <tbody style="font-size: 12px; ">
      <tr>
        <td style="text-align: center;">
          No Inventory Pallets Found
        </td>
      </tr>
    </tbody>
  </table>
  @else
  <table style="width: 100%;">
    <tbody style="font-size: 12px; ">
      <tr>
        <td>
          <label> Customer: {{ $customer->customer }} </label>
        </td>
      </tr>
    </tbody>
  </table>
  <table style="width: 100%;">
    <thead style="font-size: 10px;" class="table-list">
      <tr>
        <td>Pallet No.</td>
        <td>Packaging</td>
        <td>Storage Type</td>
        <td>Storage Bin</td>
        <td>Total Qty.</td>
        <td>Total Weight</td>
        <td>Total Volume</td>
        <td>Status</td>
        <td>remarks</td>
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
    <tbody style="font-size: 10px;">
      @php
        $total_qty = 0;
        $total_weight = 0;
      @endphp
      @foreach($data as $pallet) {}
      <tr>
        <td>{{ $pallet->pallet_number }}</td>
        <td>{{ $pallet->pallet_packaging }}</td>
        <td>{{ $pallet->storage_type }}</td>
        <td>{{ $pallet->storage_bin_number}}</td>
        @php
          $total_qty += $pallet->quantity;
          $total_weight += $pallet->weight;
        @endphp
        <td style="text-align: right">{{number_format($pallet->quantity, 4, '.', '') }}</td>
        <td style="text-align: right">{{number_format($pallet->weight, 4, '.', '') }}</td>
        <td style="text-align: right">{{number_format($pallet->volume, 4, '.', '') }}</td>
        <td>{{ $pallet->status }}</td>
        <td>{{ $pallet->remarks}}</td>
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
      </tr>
      <tr>
        <td colspan="4">Total = ></td>
        <td style="text-align: right"> {{number_format($total_qty, 4, '.', '') }} </td>
        <td style="text-align: right"> {{number_format($total_weight, 4, '.', '') }}</td>
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
      <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
    </div>
  </div>

</div>
@endsection