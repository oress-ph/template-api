@extends('layouts.app')

@section('content')
  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Transfer Request</label></td>
        </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
          <td>
            <div>
              <label>Customer: {{ ($data['tranfer_request'][0]->customer->customer !== null) ? $data['tranfer_request'][0]->customer->customer : '-' }}</label><br>
              <label>Address: {{ ($data['tranfer_request'][0]->customer->address !== null) ? $data['tranfer_request'][0]->customer->address : '-' }}</label><br>
              <label></label><br>
              <label>Contact Number: {{ ($data['tranfer_request'][0]->customer->contact_number !== null) ? $data['tranfer_request'][0]->customer->contact_number : '-' }}</label><br>
            </div>  
          </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>
            <div>
              <label>TR Number: {{ $data['tranfer_request'][0]->tr_number }}</label><br>
              <label>TR Date: {{ $data['tranfer_request'][0]->tr_date }}</label><br>
              <label>Date Request: {{ $data['tranfer_request'][0]->date_needed }}</label><br>
              <label>Source Warehouse: {{ $data['tranfer_request'][0]->source_warehouse->warehouse }}</label><br>
            </div>  
          </td>
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
      </tbody>
    </table>

    <table style="width: 100%;">
      <thead style="font-size: 14px;" class="table-list">
        <tr>
          <td>
            <div>
              <label>Total Quantity:{{ 0 }}</label><br>
              <label>Total Weight:{{ 0 }}</label><br>
            </div>  
          </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>
            <div>
              <label>Total Pallet:{{ 0 }}</label><br>
              <label>Total Volume:{{ 0 }}</label><br>
            </div>  
          </td>
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
        <tr>
          <td>No.</td>
          <td>Material Code</td>
          <td>Material</td>
          <td>Quantity</td>
          <td>Unit</td>
          <td>Weight</td>
          <td>Batch</td>
          <td>Expiry Date</td>
          <td>Storage</td>
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
      @php
        $j = 0;
      @endphp
      @for($i = 0; $i < $count; $i++) 
        @php
          $j = $j + 1;
        @endphp
        <tr>
            <td>{{ $j ?  $j : '-' }}</td>
            <td>{{ $data['tranfer_request_item'][$i]->customer_material->code ?  $data['tranfer_request_item'][$i]->customer_material->code : '-'}}</td>
            <td>{{ $data['tranfer_request_item'][$i]->customer_material->material ?  $data['tranfer_request_item'][$i]->customer_material->material : '-'}}</td>
            <td>{{ $data['tranfer_request_item'][$i]->quantity ?  $data['tranfer_request_item'][$i]->quantity : '-'}}</td>
            <td>{{ $data['tranfer_request_item'][$i]->unit ?  $data['tranfer_request_item'][$i]->unit : '-'}}</td>
            <td>{{ $data['tranfer_request_item'][$i]->weight ?  $data['tranfer_request_item'][$i]->weight : '-'}}</td>
            <td>{{ $data['tranfer_request_item'][$i]->batch_number ?  $data['tranfer_request_item'][$i]->batch_number : '-'}}</td>
            <td>{{ $data['tranfer_request_item'][$i]->expiry_date ?  $data['tranfer_request_item'][$i]->expiry_date : '-'}}</td>
            <td>{{ $data['tranfer_request_item'][$i]->storage_type->storage_type ?  $data['tranfer_request_item'][$i]->storage_type->storage_type : '-'}}</td>
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
            <td></td>
          </tr>
      </tbody>
    </table>

    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
          <td>
            <div>
              <label>Remarks: {{ $data['tranfer_request'][0]->remarks ?  $data['tranfer_request'][0]->remarks : '-'}}</label><br>
            </div>  
          </td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>
            <div>
              <label>Prepared By: {{ $data['tranfer_request'][0]->prepared_by_user->name ?  $data['tranfer_request'][0]->prepared_by_user->name : '-'}}</label> &nbsp; &nbsp;
              <label>Checked By: {{ $data['tranfer_request'][0]->checked_by_user->name ?  $data['tranfer_request'][0]->checked_by_user->name : '-'}}</label> &nbsp; &nbsp;
              <label>Approved  By: {{ $data['tranfer_request'][0]->approved_by_user->name ?  $data['tranfer_request'][0]->approved_by_user->name : '-'}}</label> &nbsp; &nbsp;
              <label>Conforme: - </label> &nbsp; &nbsp;
            </div>  
          </td>
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
      <label for="document_no" style="float: left;">Document No. 18</label>
      <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
    </div>
  </div>

</div>

  @endsection