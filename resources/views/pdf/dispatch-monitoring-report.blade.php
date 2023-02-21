@extends('layouts.app')

@section('content')
  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Dispatch Monitoring Report</label></td>
        </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
          <td>
            <div>
              <label>Date: {{ $date }}</label><br>
              <label>Warehouse: {{ $warehouse->warehouse }}</label><br>
            </div>  
          </td>
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
        </tr>
        <tr class="border-dash">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
      </tbody>
    </table>

    <table style="width: 100%;">
      <thead style="font-size: 14px;" class="table-list">
        <tr>
          <td>Dispatch No.</td>
          <td>Customer</td>
          <td>Date Required</td>
          <td>Time Required</td>
          <td>Status</td>
          <td>Remarks</td>
        </tr>
        <tr class="border-dash">
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
        </tr>
      </thead>
      <tbody style="font-size: 12px;">
        @if(blank($dispatch_order)) {}
            <tr>
            <td colspan="10" style="text-align: center">No Record Found</td>
            </tr>
        @else
          @for($i = 0; $i < $count; $i++)
            <tr>
                <td>{{ $dispatch_order[$i]->do_number ?  $dispatch_order[$i]->do_number : '-' }}</td>
                <td>{{ $dispatch_order[$i]->customer->customer ?  $dispatch_order[$i]->customer->customer : '-'}}</td>
                <td>{{ date('d M Y', strtotime($dispatch_order[$i]->dispatch_request->date_needed)) }}</td>
                <td>{{ date('h:i a', strtotime($dispatch_order[$i]->dispatch_request->date_needed)) }}</td>
                <td>{{ $dispatch_order[$i]->status ?  $dispatch_order[$i]->status : '-'}}</td>
                <td>{{ $dispatch_order[$i]->remarks ?  $dispatch_order[$i]->remarks : '-'}}</td>
            </tr>
          @endfor
        @endif
          <tr class="border-dash">
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
      <label for="document_no" style="float: left;">Document No. 21</label>
      <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
    </div>
  </div>

</div>

  @endsection