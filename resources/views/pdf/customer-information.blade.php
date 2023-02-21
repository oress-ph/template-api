@extends('layouts.app')

@section('content')
  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Customer Information Sheet</label></td>
        </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
            <td>
            <div>
              <label>Customer Code: {{ $data['customer'][0]->code }}</label><br>
              <label>Customer Name/Company: {{ $data['customer'][0]->customer }}</label><br>
              <label>Address: {{ $data['customer'][0]->address }}</label><br>
              <label>City: {{ $data['customer'][0]->city }}</label><br>
              <label>Province: {{ $data['customer'][0]->province }}</label><br>
              <label>Country: {{ $data['customer'][0]->country }}</label><br>
              <label>Postal Code: {{ $data['customer'][0]->zip_code }}</label><br>
              <label>Nature of Business: {{ $data['customer'][0]->nature_of_business }}</label><br>
              <label>TIN: {{ $data['customer'][0]->tin }}</label><br>
              <label>Terms: {{ $data['customer'][0]->terms }}</label><br>
              <label>Remarks: {{ $data['customer'][0]->remarks }}</label><br>
            </div>
          </td>
          <td>
            <div>
              <div style="display: flex; flex-direction: column; margin-bottom: 15px">
                <label>Rate Sheet (RS) No.: {{ $data['customer'][0]->rate_sheets == null ? '-' : $data['customer'][0]->rate_sheets->rs_number }} </label><br>
                <label>Date Created: {{ $data['customer'][0]->rate_sheets == null ? '-' : $data['customer'][0]->rate_sheets->rs_date }}</label><br>
                <label>Validity Date Start: {{ $data['customer'][0]->rate_sheets == null ? '-' : $data['customer'][0]->rate_sheets->start_date }}</label><br>
                <label>Validity Date End: {{ $data['customer'][0]->rate_sheets == null ? '-' : $data['customer'][0]->rate_sheets->expiry_date  }}</label><br>
              </div>

              <div style="display: flex; flex-direction: column;">
                <label>
                  Type: {{ $data['customer'][0]->customer_type }}
                </label>
                <br>
                <label>
                  Status: {{ $data['customer'][0]->status }}
                </label>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    <table style="width: 100%;">
      <thead style="font-size: 14px;" class="table-list">
        <tr>
          <td>Contact</td>
          <td>Position</td>
          <td>Address</td>
          <td>Contact No</td>
          <td>Email</td>
          <td>Email Notification Option</td>
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
      @if($count == 0) {}
        <tr>
          <td colspan="7" style="text-align: center">No Record</td>
        </tr>
      @else
        @for($i = 0; $i < $count; $i++) 
          <tr>
            <td>{{ $data['customer_contact'][$i]->contact_name }}</td>
            <td>{{ $data['customer_contact'][$i]->position }}</td>
            <td>{{ $data['customer_contact'][$i]->address }}</td>
            <td>{{ $data['customer_contact'][$i]->contact_number }}</td>
            <td>{{ $data['customer_contact'][$i]->email }}</td>
            <td>{{ $data['customer_contact'][$i]->email_option }}</td>
            <td>{{ $data['customer_contact'][$i]->remarks }}</td>
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
            <td></td>
        </tr>
      </tbody>
    </table>
  </div>

<div style="position:absolute; bottom: 0; width: 100%;">

  <div style="display: flex;">
    <div style="margin-top: 20px;">
      <label for="document_no" style="float: left;">Document No. 2</label>
      <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
    </div>
  </div>

</div>

  @endsection