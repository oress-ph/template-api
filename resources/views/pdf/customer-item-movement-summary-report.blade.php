@extends('layouts.app')

@section('content')
<div style="width: 100%;">
  <table style="width: 100%;">
    <thead>
      <tr>
        <td>
          <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100">
        </td>
        <td style="padding-left: 10rem;"><label style="font-size: 18px;">Customer Item Movement Summary Report</label></td>
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
          <label>Customer: {{ $customer->customer }} </label>
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
        <td>Material</td>
        <td>Manual Batch No.</td>
        <td>Item Code</td>
        <td>Beginning Weight</td>
        <td>Receipts Weight</td>
        <td>Issues Weight</td>
        <td>Ending Weight</td>
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
      @foreach($data as $item)
      <tr>
        <td> {{ $item->batch_number}} </td>
        <td> {{ $item->code}} </td>
        <td> {{ $item->material}} </td>
        <td> {{ $item->manual_batch_number }} </td>
        <td> {{ $item->code}} </td>
        <td style="text-align: right"> {{number_format($item->begin_weight, 2) }} </td>
        <td style="text-align: right"> {{ number_format($item->receipts_weight, 2)}} </td>
        <td style="text-align: right"> {{ number_format($item->issue_weight, 2)}} </td>
        <td style="text-align: right"> {{ number_format($item->end_weight, 2)}}</td>
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
        <td colspan="2">
          <label>Total => </label>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: right"> {{ number_format($total['total_begin'], 2) }} </td>
        <td style="text-align: right"> {{number_format($total['total_receipts'], 2)}} </td>
        <td style="text-align: right"> {{number_format($total['total_issues'], 2)}} </td>
        <td style="text-align: right"> {{number_format($total['total_end'], 2)}} </td>
       
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
    </tbody>
    @endif
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