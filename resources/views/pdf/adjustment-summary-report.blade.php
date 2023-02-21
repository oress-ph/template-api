
@extends('layouts.app')

@section('content')
  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;"> Adjustment Report </label></td>
        </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
            <td style="max-width: 350px;">
              <div>
                <label>Customer: {{ blank($data) ? '-' : $data[0]->physical_count->customer->customer }}</label><br><br>
                <label>Address: {{ blank($data) ? '-' : $data[0]->physical_count->customer->address }} </label><br><br>
                @if(blank($data)) <label>Contact Number : - </label>
                @else
                <label> Contact Number : 
                  @foreach($data[0]->physical_count->customer->customer_contact as $customer_contact)
                    {{ $customer_contact->contact_number }} /
                  @endforeach
                </label>
                @endif
              </div>  
            </td>
            <td>
              <div style="max-width: 350px;">
                <label>Adjustment Number: AN{{ blank($data) ? '-' : $data[0]->ia_number }} </label><br><br>
                <label>Reference: PC-{{ blank($data) ? '-' : $data[0]->physical_count->pc_number }}</label><br><br>
                <label>Date: {{ blank($data) ? '-' : $data[0]->ia_date }} </label><br>
              </div>  
            </td>
            <td>
              <div style="max-width: 350px;">
                  <label class="checkbox"><input type="checkbox" {{ ($is_increase == true) ? ' checked' : ' unchecked' }} /> Increase </label>
              </div>  
            </td>
            <td>
              <div>
                <label class="checkbox"><input type="checkbox" {{ ($is_increase == false) ? ' checked' : ' unchecked' }}> Decrease </label>
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
              <label>Total Quantity: {{ $total_qty }}</label><br><br>
              <label>Total Weight:  {{ $total_weight }} </label><br>
            </div>  
          </td>
          <td>
            <div>
              <label>Total Pallet:  {{ $total_pallet }} </label><br><br>
              <label>Total Volume:  {{ $total_volume }}</label><br>
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
          <td>Item</td>
          <td>Material Code</td>
          <td>Material Desc</td>
          <td>Qty</td>
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
      @if(blank($data))
          <tr style="text-align: center;">
            <td colspan="9">
            No Records Found
            </td>
          </tr>
      @else
        @foreach($data as $item)
          <tr>
            <td>{{ $item->inventory_item->customer_material->material }}</td>
            <td>{{ $item->inventory_item->customer_material->code }}</td>
            <td>{{ $item->inventory_item->customer_material->particulars }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->unit }}</td>
            <td>{{ $item->weight }}</td>
            <td>{{ $item->inventory_item->batch_number }}</td>
            <td>{{ $item->inventory_item->expiry_date }}</td>
            <td>{{ $item->inventory_item->customer_material->storage_type->storage_type }}</td>
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
                <label>Remarks: {{ blank($data) ? '-' : $data[0]->remarks }}</label><br>
                <br>
                <label>Prepared By: {{ blank($data) ? '-' : $data[0]->prepared_by_user->name }} </label> &nbsp; &nbsp;
                <label>Checked By: {{ blank($data) ? '-' : $data[0]->checked_by_user->name }} </label> &nbsp; &nbsp;
                <label>Approved  By: {{ blank($data) ? '-' : $data[0]->approved_by_user->name }} </label> &nbsp; &nbsp;
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