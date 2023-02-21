
@extends('layouts.app')

@section('content')
  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Receiving Report </label></td>
        </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
            <td>
              <div>
                <label>Customer: {{ $data[0]->customer->customer }}</label><br><br>
                <label>Address: {{ $data[0]->customer->address }} </label><br><br>
                <label>Contact Number: {{ $data[0]->customer_contact[0]->contact_number }} </label><br>
              </div>  
            </td>
            <td>
              <div>
                <label>RR Number: {{ $data[0]->wr_number }} </label><br><br>
                <label>RR Date: {{ $data[0]->wr_date }}</label><br><br>
                <label>Vehicle/ Container No: ***** </label><br>
              </div>  
            </td>
        </tr>
      </tbody>
    </table>
    <br>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr class="border-dash">
            <td></td>
            <td></td>
        </tr>
        <tr class="border-dash">
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>
              <div>
                <label>Total Quantity: {{ $counts['qty'] }} </label><br><br>
                <label>Total Weight: {{ $counts['weight'] }} </label><br>
              </div>  
          </td>
          <td>
            <div>
              <label>Total Pallet: {{ $counts['pallet'] }} </label><br><br>
              <label>Total Volume: {{ $counts['vol'] }}</label><br>
            </div>  
          </td>
        </tr>

        <tr class="border-dash">
            <td></td>
            <td></td>
        </tr>
        
        <tr class="border-dash">
            <td></td>
            <td></td>
        </tr>
      </tbody>
    </table>
    <br>
    <table style="width: 100%;">
      <thead style="font-size: 14px;" class="table-list">
        <tr>
          <td>No</td>
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
      @if(blank($data[0]->warehouse_receiving_items)) {}
        <tr>
          <td colspan="9" style="text-align: center">No Record Found</td>
        </tr>
      @else
        @foreach($data[0]->warehouse_receiving_items as $items) <tr>
              <td> {{ $loop->index + 1 }} </td>
              <td> {{ $items->customer_material->material_type->code }} </td>
              <td> {{ $items->customer_material->material }} </td>
              <td> {{ $items->quantity }} </td>
              <td> {{ $items->unit }} </td>
              <td> {{ $items->weight }} </td>
              <td> {{ $items->batch_number }} </td>
              <td> {{ $items->expiry_date }} </td>
              <td> {{ $items->warehouse_receiving_pallet->storage_type->storage_type }} </td>
              </tr>
        @endforeach 
      @endif

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
    <br>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
            <td>
              <div>
                <br>
                <label>Remarks: {{ $data[0]->remarks}}</label><br>
                <br>
                <label>Prepared By: {{ $data[0]->prepared_by_user->name }} </label> &nbsp; &nbsp;
                <label>Checked By: {{ $data[0]->checked_by_user->name }} </label> &nbsp; &nbsp;
                <label>Approved  By: {{ $data[0]->approved_by_user->name }} </label> &nbsp; &nbsp;
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
      <label for="document_no" style="float: left;">Document No. 1</label>
      <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
    </div>
  </div>

</div>

  @endsection