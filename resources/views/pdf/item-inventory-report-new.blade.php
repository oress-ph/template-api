@extends('layouts.app')

@section('content')
<div style="width: 100%;">
  <table style="width: 100%;">
    <thead>
      <tr>
        <td>
          <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100">
        </td>
        <td style="padding-left: 13rem;"><label style="font-size: 18px; padding-top:10px;">Inventory Item Report</label></td>
      </tr>
    </thead>
  </table>
  <hr>
  @if(blank($data))
  <table style="width: 100%;">
    <tbody style="font-size: 12px; ">
      <tr>
        <td style="text-align: center;">
          No inventory Item Found
        </td>
      </tr>
    </tbody>
  </table>
  @else
  <table style="width: 100%;">
    <tbody style="font-size: 12px; ">
      <tr>
        <td>
          <label> Customer: {{ $data[0]->customer }} </label>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <table style="width: 100%;">
    <thead style="font-size: 14px;" class="table-list">
      <tr>
        <td>Batch No.</td>
        <td>Code</td>
        <td>Description</td>
        <td>Expiry Date</td>
        <td>Storage Type</td>
        <td>Storage Bin</td>
        <td>Pal. No.</td>
        <td>Quantity</td>
        <td>Weight</td>
        <td>Volume</td>
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
      @php
      $total_qty = 0;
      $total_weight = 0;
      @endphp
      @foreach($data as $item)
      <tr>
        <td>{{$item->batch_number}}</td>
        <td>{{$item->code}}</td>
        <td>{{$item->material}}</td>
        <td>{{ date('d M Y', strtotime($item->expiry_date)) }}</td>
        <td>{{$item->storage_type}}</td>
        <td>{{$item->storage_bin_number}}</td>
        <td>{{$item->pallet_number}}</td>
        @php
        $total_qty += $item->quantity;
        $total_weight += $item->weight;
        @endphp
        <td style="text-align: right;">{{$item->quantity}}</td>
        <td style="text-align: right;">{{number_format($item->weight, 4, '.', '')}}</td>
        <td style="text-align: right;">{{number_format($item->volume, 4, '.', '')}}</td>
        <td>{{ date('d M Y', strtotime($item->wr_date)) }}</td>
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
      <tr class="border-dash">
        <td colspan="5"> Total = ></td>
        <td></td>
        <td></td>
        <td style="text-align: right;">{{ $total_qty }}</td>
        <td style="text-align: right;">{{ number_format($total_weight, 4, '.', '') }}</td>
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