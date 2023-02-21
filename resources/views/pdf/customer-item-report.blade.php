@extends('layouts.app')

@section('content')
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
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
            <td>
              <label>Customer Name: {{ $data[0]->customer->customer }}</label>
            </td>
            <td>
              <label> Warehouse: {{ $data[0]->warehouse->warehouse }}</label>
            </td>
        </tr>
        <tr>
            <td>
              <label>Address:  {{ $data[0]->customer->address }}</label>
            </td>
            <td>
              <label> Date Start: {{ $start }}</label>
            </td>
            <td>
              <label> Date End:  {{ $end }}</label>
            </td>
        </tr>
        <tr>
            <td>
              <label>Email: {{ $data[0]->customer->customer_contacts[0]->email }}</label>
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
          <td>Code</td>
          <td>Material</td>
          <td>Beginning Qty</td>
          <td>Weight(kg)</td>
          <td>Receipts Qty</td>
          <td>Weight(kg)</td>
          <td>Issues Qty</td>
          <td>Weight(kg)</td>
          <td>Ending Qty</td>
          <td>Weight(kg)</td>
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
      @foreach($data as $item)
        @php
          $transaction_qty = 0; 
          $transaction_weight = 0;
          $ending_qty = 0;
          $ending_weight = 0;
          $total_beg_qty = 0;
          $total_beg_weight = 0;
          $total_issue_qty = 0;
          $total_issue_weight = 0;
          $total_recp_qty = 0;
          $total_recp_weight = 0;
          $total_end_qty = 0;
        @endphp
        <tr>
          <td>{{ $item->customer_material->code }}</td>
          <td> {{ $item->customer_material->material }}</td>
          <td style="text-align: center;"> {{ $item->quantity }} </td>
          <td style="text-align: center;"> {{ $item->weight }} </td>
          <td style="text-align: center;"> {{ $item->inventory_pallet->total_quantity }} </td>
          <td style="text-align: center;"> {{ $item->inventory_pallet->total_weight }} </td>
          <td style="text-align: center;">@foreach($item->inventory_item_transaction as $transaction)
            @php $transaction_qty += $transaction->quantity; @endphp
            @endforeach
              {{ $transaction_qty; }}
          </td>
          <td style="text-align: center;">@foreach($item->inventory_item_transaction as $transaction)
            @php $transaction_weight += $transaction->weight; @endphp
            @endforeach  {{ $transaction_weight }}
          </td>
          @php $ending_qty = ($item->inventory_pallet->total_quantity + $item->quantity) - $transaction_qty ; @endphp
          <td style="text-align: center;"> {{ $ending_qty }} </td>
          @php $ending_weight = (number_format((float)$item->inventory_pallet->total_weight, 4, '.', '') + number_format((float)$item->weight, 4, '.', '')) - $transaction_weight; @endphp
          <td style="text-align: center;"> {{ number_format((float)$ending_weight, 4, '.', '')}}  </td>
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
            <td style="text-align: center;"> @foreach($data as $item)
            @php $total_beg_qty += $item->quantity; @endphp
            @endforeach {{ $total_beg_qty }}</td>
            <td style="text-align: center;"> @foreach($data as $item)
            @php $total_beg_weight += $item->weight; @endphp
            @endforeach {{ number_format((float)$total_beg_weight, 4, '.', '') }}</td>
            <td style="text-align: center;">@foreach($data as $item)
            @php $total_recp_qty += $item->inventory_pallet->total_quantity; @endphp
            @endforeach {{ $total_recp_qty }}</td>
            <td style="text-align: center;">@foreach($data as $item)
            @php $total_recp_weight += $item->inventory_pallet->total_weight; @endphp
            @endforeach {{ number_format((float)$total_recp_weight, 4, '.', '') }}</td>
            <td style="text-align: center;">@foreach($data as $item)
            @foreach($item->inventory_item_transaction as $transaction)
            @php $total_issue_qty += $transaction->quantity; @endphp
            @endforeach
            @endforeach {{ $total_issue_qty }}</td>
            <td style="text-align: center;">@foreach($data as $item)
            @foreach($item->inventory_item_transaction as $transaction)
            @php $total_issue_weight += $transaction->weight; @endphp
            @endforeach
            @endforeach {{ number_format((float)$total_issue_weight, 4, '.', '') }}</td>
            <td style="text-align: center;"> {{ $total_beg_qty + $total_recp_qty - $total_issue_qty }}</td>
            <td style="text-align: center;"> {{ number_format((float)(($total_beg_weight + $total_recp_weight) - $total_issue_weight), 4, '.', '') }}</td>
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