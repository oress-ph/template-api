@extends('layouts.app')

@section('content')

<div style="width:100%; padding: 10px;">

<div style="display: block;">
  <table style="width: 100%;">
    <thead>
      <tr>
        <td>
        <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
        <td style="padding-left: 10rem;"><label style="font-size: 18px;">List of Customers</label></td>
      </tr>
    </thead>
  </table>
      
    <br />
</div>
    <table style="width: 100%;">
    <thead style="font-size: 14px;" class="table-list">
          <tr class="tr-head">
              <td>Customer Code</td>
              <td>Customer Registered Name</td>
              <td>Customer Type</td>
              <td>Registered Address</td>
              <td>Remarks</td>
              <td>Customer Status</td>
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
      @foreach($customers as $customer) <tr>
              <td>{{ $customer->code }}</td>
              <td>{{ $customer->customer }}</td>
              <td>{{ $customer->customer_type }}</td>
              <td>{{ $customer->address }}</td>
              <td>{{ $customer->remarks }}</td>
              <td>{{ $customer->status }}</td>
              </tr>
              @endforeach 
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
    <div style="position:absolute; bottom: 0; width: 100%;">

    <div style="display: flex;">
      <div style="margin-top: 20px;">
        <label for="document_no" style="float: left;">Document No. 2</label>
        <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
      </div>
    </div>

    </div>
  </div>
  @endsection
