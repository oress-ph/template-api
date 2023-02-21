@extends('layouts.app')

@section('content')
  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Rate Sheet Report</label></td>
        </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
            <td>
              <div>
                <label>Rs No: {{ $data['rate_sheet'][0]->rs_number ? $data['rate_sheet'][0]->rs_number : '-' }}</label><br>
                <label>Rs Date: {{ $data['rate_sheet'][0]->rs_date ? $data['rate_sheet'][0]->rs_date : '-' }}</label><br>
                <label>Customer: {{ ($data['rate_sheet'][0]->customer !== null) ? $data['rate_sheet'][0]->customer->customer : '-' }}</label><br>
                <label>Address: {{ ($data['rate_sheet'][0]->customer !== null) ? $data['rate_sheet'][0]->customer->address : '-' }}</label><br>
                <label>Contact Person: {{ ($data['rate_sheet'][0]->customer_contact !== null) ? $data['rate_sheet'][0]->customer_contact->contact_name : '-' }}</label><br>
                <label>Contact Number: {{ ($data['rate_sheet'][0]->customer_contact !== null) ? $data['rate_sheet'][0]->customer_contact->contact_number : '-' }}</label><br>
                <label>Email: {{ ($data['rate_sheet'][0]->customer_contact !== null) ? $data['rate_sheet'][0]->customer_contact->email : '-'}}</label><br>
                <label>TIN: {{ ($data['rate_sheet'][0]->customer !== null) ? $data['rate_sheet'][0]->customer->tin : '-'}}</label><br>
              </div>  
          </td>
          <td>
            <div>
              <label>Date Start: {{ $data['rate_sheet'][0]->start_date }}</label><br>
              <label>Date Expiration: {{ $data['rate_sheet'][0]->expiry_date }}</label><br>
              <label>Customer Type: {{ $data['rate_sheet'][0]->customer->customer_type }}</label><br>
              <label>Status: {{ $data['rate_sheet'][0]->status }}</label><br>
              <label></label><br>
              <label></label><br>
              <label></label><br>
              <label></label><br>
              <label></label><br>
            </div>  
          </td>
        </tr>
      </tbody>
    </table>

    <table style="width: 100%;">
      <thead style="font-size: 14px;" class="table-list">
        <tr>
          <td>Service Code</td>
          <td>Service</td>
          <td>Unit of Measurement</td>
          <td>Remarks</td>
          <td>Price</td>
        </tr>
        <tr class="border-dash">
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
        </tr>
      </thead>
      <tbody style="font-size: 12px;">
      @for($i = 0; $i < $count; $i++) 
        <tr>
            <td>{{ $data['rate_sheet_service'][$i]->service->code ?  $data['rate_sheet_service'][$i]->service->code : '-' }}</td>
            <td>{{ $data['rate_sheet_service'][$i]->service->service_group ?  $data['rate_sheet_service'][$i]->service->service_group : '-'}}</td>
            <td>{{ $data['rate_sheet_service'][$i]->service->service ?  $data['rate_sheet_service'][$i]->service->service : '-'}}</td>
            <td>{{ $data['rate_sheet_service'][$i]->service->particulars ?  $data['rate_sheet_service'][$i]->service->particulars : '-'}}</td>
            <td>{{ $data['rate_sheet_service'][$i]->service->price ?  $data['rate_sheet_service'][$i]->price : '-'}}</td>
          </tr>
      @endfor 
          <tr class="border-dash">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
          </tr>
      </tbody>
    </table>

    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
            <td>
              <div>
                <label>Remarks: {{ $data['rate_sheet'][0]->remarks ?  $data['rate_sheet'][0]->remarks : '-'}}</label><br>
                <label>Terms: {{ $data['rate_sheet'][0]->customer->terms ?  $data['rate_sheet'][0]->customer->terms : '-'}}</label><br>
                <label>Prepared By: {{ $data['rate_sheet'][0]->prepared_by_user->name ?  $data['rate_sheet'][0]->prepared_by_user->name : '-'}}</label> &nbsp; &nbsp;
                <label>Checked By: {{ $data['rate_sheet'][0]->checked_by_user->name ?  $data['rate_sheet'][0]->checked_by_user->name : '-'}}</label> &nbsp; &nbsp;
                <label>Approved  By: {{ $data['rate_sheet'][0]->approved_by_user->name ?  $data['rate_sheet'][0]->approved_by_user->name : '-'}}</label> &nbsp; &nbsp;
                <label>Conforme: - </label> &nbsp; &nbsp;
              </div>  
            </td>
          <td></td>
          <td></td>
          <td>
          </td>
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