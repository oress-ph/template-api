@extends('layouts.app')

@section('content')
<div style="width: 100%;">
  <table style="width: 100%;">
    <thead>
      <tr>
        <td>
          <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100">
        </td>
        <td style="padding-left: 10rem;"><label style="font-size: 18px;">Pallet Inventory Movement Report </label></td>
      </tr>
    </thead>
  </table>
  <hr>
  <table style="width: 100%;">
    <tbody style="font-size: 12px; ">
      <tr>
        <td>
          Warehouse Name : {{ (blank($data) ? '' : $data[0]->warehouse->warehouse )}}
        </td>
      </tr>
      <tr>
        <td>
          <label> Start Date: {{ $start_date }} </label>
          <label> End Date: {{ $end_date }} </label>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <table style="width: 100%;">
    <thead style="font-size: 14px;" class="table-list">
      <tr>
        <td>Transaction No.</td>
        <td>Pallet No.</td>
        <!-- <td>Total Qty</td> -->
        <!-- <td>Weight</td> -->
        <td>Bin Location</td>
        <td>Date</td>
        <td>User</td>
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
      </tr>
    </thead>
    <tbody style="font-size: 12px;">
      @if(blank($data)) {}
      <tr>
        <td colspan="8" style="text-align: center;"> No Inventory Pallet Transaction Found</td>
      </tr>
      @else
        @php
          $total_qty = 0;
          $total_weight = 0;
        @endphp
      @foreach($data as $item) {}
      <tr>
        <!-- Transaction Number -->
        @if ($item->wr_id != null)
        <td>{{ 'WR'.$item->warehouse_receiving->wr_number }}</td>
        @elseif ($item->pa_id != null)
        <td>{{ 'PA'.$item->put_away->pa_number }}</td>
        @elseif ($item->pl_id != null)
        <td>{{ 'PL'.$item->pick_list->pl_number }}</td>
        @elseif ($item->bb_id != null)
        <td>{{ 'BB'.$item->bin_to_bin->bb_number }}</td>
        @else
        <td>{{ 'WR'.$item->warehouse_receiving->wr_number }}</td>
        @endif
        <!-- Pallet Number -->
        <td>{{ $item->inventory_pallet->pallet_number }}</td>
        @php
          $total_qty += $item->quantity;
          $total_weight += $item->weight;
        @endphp
        <!-- Total Qty -->
        <!-- <td style="text-align: right;">{{ $item->inventory_pallet->total_quantity }}</td> -->
        <!-- Weight -->
        <!-- <td style="text-align: right;">{{ number_format($item->weight, 4, '.', '')  }}</td> -->
        <!-- Bin Location -->
        <td style="text-align: center;">{{ $item->storage_room_bin->storage_bin_number}}</td>
        @if ($item->wr_id != null)
        <td>{{ $item->warehouse_receiving->wr_date }}</td>
        <td>{{ $item->warehouse_receiving->prepared_by_user->name }}</td>
        <td>{{ $item->warehouse_receiving->remarks }}</td>
        @elseif ($item->pa_id != null)
        <td>{{ $item->put_away->pa_date }}</td>
        <td>{{ $item->put_away->prepared_by_user->name }}</td>
        <td>{{ $item->put_away->remarks }}</td>
        @elseif ($item->pl_id != null)
        <td>{{ $item->pick_list->pl_date }}</td>
        <td>{{ $item->pick_list->prepared_by_user->name }}</td>
        <td>{{ $item->pick_list->remarks }}</td>
        @elseif ($item->bb_id != null)
        <td>{{ $item->bin_to_bin->bb_date }}</td>
        <td>{{ $item->bin_to_bin->prepared_by_user->name }}</td>
        <td>{{ $item->bin_to_bin->remarks }}</td>
        @else
        <td>{{ $item->warehouse_receiving->wr_date }}</td>
        <td>{{ $item->warehouse_receiving->prepared_by_user->name }}</td>
        <td>{{ $item->warehouse_receiving->remarks }}</td>
        @endif
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
      </tr>
      <!-- <tr>
        <td colspan="2">Total = ></td>
        <td style="text-align: right;">{{ $total_qty }}</td>
        <td style="text-align: right;">{{ number_format($total_weight, 4, '.', '')  }}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr> -->
      @endif
    </tbody>
  </table>
  <br>

  <div style="position:absolute; bottom: 0; width: 100%;">
    <div style="display: flex;">
      <div style="margin-top: 20px;">
        <label for="document_no" style="float: left;">Document No.02</label>
        <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
      </div>
    </div>
  </div>
</div>
@endsection