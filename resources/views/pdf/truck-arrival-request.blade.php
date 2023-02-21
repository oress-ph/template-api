@extends('layouts.app')

@section('content')
  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Truck Arrival Request Report</label></td>
        </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
            <td>
                <div>
                  <label>TR No: {{ $data['truck_request'][0]->tr_number ? $data['truck_request'][0]->tr_number : '-' }}</label><br>
                  <label>TR Date: {{ $data['truck_request'][0]->tr_date ? $data['truck_request'][0]->tr_date : '-' }}</label><br>
                  <label>Customer: {{ ($data['truck_request'][0]->customer !== null) ? $data['truck_request'][0]->customer->customer : '-' }}</label><br>
                  <label>Status: {{ ($data['truck_request'][0]->status !== null) ? $data['truck_request'][0]->status : '-' }}</label><br>
                </div>  
          </td>
        </tr>
      </tbody>
    </table>
  
    <table style="width: 100%;">
      <thead style="font-size: 14px; " class="table-list">
        <tr>
          <td>Container No.</td>
          <td>ETA</td>
          <td>Trucking</td>
          <td>Size</td>
          <td>Container Type</td>
          <td>Delivery Type</td>
          <td>Remarks</td>
          <td>Status</td>
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
            @for($i = 0; $i < $count; $i++)
              <tr>
                   <td>{{ $data['request_container'][$i]->container_number ? $data['request_container'][$i]->container_number : '-' }}</td>
                   <td>{{ $data['request_container'][$i]->eta ? $data['request_container'][$i]->eta : '-' }}</td>
                   <td>{{ $data['request_container'][$i]->trucking_company ? $data['request_container'][$i]->trucking_company : '-' }}</td>
                   <td>{{ $data['request_container'][$i]->container_size ? $data['request_container'][$i]->container_size : '-' }}</td>
                   <td>{{ $data['request_container'][$i]->container_type ? $data['request_container'][$i]->container_type : '-' }}</td>
                   <td>{{ $data['request_container'][$i]->delivery_type ? $data['request_container'][$i]->delivery_type : '-' }}</td>
                   <td>{{ $data['request_container'][$i]->remarks ? $data['request_container'][$i]->remarks : '-' }}</td>
                   <td>{{ $data['request_container'][$i]->remarks ? $data['request_container'][$i]->status : '-' }}</td>
              </tr>
            @endfor
    
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
 
    </table>
    <br>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
            <td>
              <div>
                <label>Total No. of Container:  {{$count }}</label><br>
                <label>Remarks: {{ $data['truck_request'][0]->remarks ?  $data['truck_request'][0]->remarks : '-'}}</label><br><br>
                <label>Prepared By: {{ $data['truck_request'][0]->prepared_by_user->name ?  $data['truck_request'][0]->prepared_by_user->name : '-'}}</label> &nbsp; &nbsp;
                <label>Checked By: {{ $data['truck_request'][0]->checked_by_user->name ?  $data['truck_request'][0]->checked_by_user->name : '-'}}</label> &nbsp; &nbsp;
                <label>Approved  By: {{ $data['truck_request'][0]->approved_by_user->name ?  $data['truck_request'][0]->approved_by_user->name : '-'}}</label> &nbsp; &nbsp;
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
      <label for="document_no" style="float: left;">Document No. 9</label>
      <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
    </div>
  </div>

</div>

@endsection



