@extends('layouts.app')

@section('content')
<div style="width: 100%;">
  <table style="width: 100%;">
    <thead>
      <tr>
        <td>
          <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100">
        </td>
        <td style="padding-left: 13rem;"><label style="font-size: 18px; padding-top:10px;">Item Inventory Movement Report</label></td>
      </tr>
    </thead>
  </table>
  <hr>
  @if(blank($inventory_item_transaction))
  <table style="width: 100%;">
    <tbody style="font-size: 12px; ">
      <tr>
        <td style="text-align: center;">
          No inventory Item Transaction Found
        </td>
      </tr>
    </tbody>
  </table>
  @else
  <table style="width: 100%;">
    <tbody style="font-size: 12px; ">
      <tr>
        <td>
          <label> Warehouse: {{ $inventory_item_transaction[0]->warehouse->warehouse }} </label>
        </td>
      </tr>
      <tr>
        <td>
          <label> Start Date: {{ $start_date }} </label>
          <label> End Date: {{ $end_date }} </label>
        </td>
      </tr>
      @if($is_all_customer == false)
      <tr>
        <td>
          <label> Customer: {{ $customer }} </label>
        </td>
      </tr>
      @endif
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
        <td>Transaction</td>
        <td>Avail <br>Qty</td>
        <td><br />Weight</td>
        <td>PA <br>Qty</td>
        <td><br />Weight</td>
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
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </thead>
    <tbody style="font-size: 12px;">
      @php 
        $total_avail_qty = 0;
        $total_avail_weight = 0;
        $total_pa_qty = 0;
        $total_pa_weight = 0;
        $total_pl_qty = 0;
        $total_pl_weight = 0;
        $total_qty = 0;
        $total_weight = 0;
      @endphp
      @foreach($inventory_item_transaction as $item)
      
      <tr>
        <td>{{ $item->inventory_item->batch_number }}</td>
        <td>{{ $item->inventory_item->customer_material->code }}</td>
        <td>{{ $item->inventory_item->customer_material->material }}</td>
        <td>{{ $item->expiry_date }}</td>
        <td>{{ $item->inventory_item->customer_material->material_type->storage_type->storage_type }}</td>
        <td>{{ $item->inventory_pallet->storage_room_bin->storage_bin_number }}</td>
        <td>{{ $item->inventory_pallet->pallet_number }}</td>
        @if($item->wr_id != null)
        <td>{{ 'WR'.$item->warehouse_receiving->wr_number }}</td>
        @elseif($item->pl_id != null)
        <td>{{ 'PL'.$item->pick_list->pl_number }}</td>
        @elseif($item->ia_id != null)
        <td>{{ 'AI'.$item->inventory_adjustment->ia_number }}</td>
        @elseif($item->pb_id != null)
        <td>{{ 'PB'.$item->partial_bin->pb_number }}</td>
        @endif
        @php
            $total_avail_qty += $item->quantity;
            $total_avail_weight += $item->weight;
            $total_pa_qty += $item->pa_quantity;
            $total_pa_weight += $item->pa_weight;
            $total_pl_qty += $item->pl_quantity;
            $total_pl_weight += $item->pl_weight;
            $total_qty += $item->quantity;
            $total_weight += $item->weight;
        @endphp
        <td style="text-align: right;">{{ $item->quantity }}</td>
        <td style="text-align: right;">{{ number_format($item->weight, 4, '.', '') }}</td>
        <td style="text-align: right;">{{ $item->pa_quantity }}</td>
        <td style="text-align: right;">{{ number_format($item->pa_weight, 4, '.', '') }}</td>
        <td style="text-align: right;">{{ $item->pl_quantity }}</td>
        <td style="text-align: right;">{{ number_format($item->pl_weight, 4, '.', '') }}</td>
        <td style="text-align: right;">{{ $item->quantity }}</td>
        <td style="text-align: right;">{{ number_format($item->weight, 4, '.', '') }}</td>
        <td>{{ ($item->wr_id == null) ? '' : $item->warehouse_receiving->wr_date}}</td>
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
        <td></td>
        <td></td>
        <td></td>
      </tr>
      
      <tr>
        <td colspan="6">Total = > </td>
        <td></td>
        <td></td>
        <td style="text-align: right;">{{ $total_avail_qty }}</td>
        <td style="text-align: right;">{{ number_format($total_avail_weight, 4, '.', '') }}</td>
        <td style="text-align: right;">{{ $total_pa_qty }}</td>
        <td style="text-align: right;">{{ number_format($total_pa_weight, 4, '.', '') }}</td>
        <td style="text-align: right;">{{ $total_pl_qty }}</td>
        <td style="text-align: right;">{{ number_format($total_pl_weight, 4, '.', '') }}</td>
        <td style="text-align: right;">{{ $total_qty }}</td>
        <td style="text-align: right;">{{ number_format($total_weight, 4, '.', '') }}</td>
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