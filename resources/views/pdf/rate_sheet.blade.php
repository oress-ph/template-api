@extends('layouts.app')

@section('content')
<div style="width:100%; padding: 10px;">

<div style="display: block;">
  <table style="width: 100%;">
    <thead>
      <tr>
        <td>
        <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
        <td style="padding-left: 10rem;"><label style="font-size: 18px;">Rate Sheet Expiration Report</label></td>
      </tr>
    </thead>
  </table>
      
    <br />
    <label for="start_date">Start Date: {{ $start }}</label>
    <br />
    <label for="expiry_date">End Date: {{ $end }}</label>
</div>
<br />
    <table style="width: 100%;">
    <thead style="font-size: 14px;" class="table-list">
    
      <tr class="tr-head">
            <td>RS No </td>
            <td>RS Date</td>
            <td>Date of Expiration</td>
            <td>Customer</td>
            <td>Type</td>
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
        </tr>
    </thead>
    <tbody style="font-size: 12px;">
    @foreach($rate_sheets as $rate_sheet) <tr>
            <td>{{ $rate_sheet->rs_number }}</td>
            <td>{{ $rate_sheet->rs_date }}</td>
            <td>{{ $rate_sheet->expiry_date }}</td>
            <td>{{ $rate_sheet->customer->customer }}</td>
            <td>{{ $rate_sheet->customer->customer_type }}</td>
            <td>{{ $rate_sheet->status }}</td>
            <td>{{ $rate_sheet->remarks }}</td>
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
        </tr>
    </tbody>
    
    </table>
<div style="position:absolute; bottom: 0; width: 100%;">

  <div style="display: flex;">
    <div style="margin-top: 20px;">
      <label for="document_no" style="float: left;">Document No. 2</label>
      <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
    </div>
  </div>

</div>
@endsection