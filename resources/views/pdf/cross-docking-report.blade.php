
@extends('layouts.app')

@section('content')
  @if(blank($data))
    <div style="width: 100%;">
      <table style="width: 100%;">
          <thead>
          <tr>
              <td>
              <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
              <td style="padding-left: 10rem;"><label style="font-size: 18px;">Cross Docking Report </label></td>
          </tr>
          </thead>
      </table>
      <hr>
      <label> No Records Found </label>
    </div>
  @else
    @foreach($data as $item) 
      <div style="width: 100%;">
        <table style="width: 100%;">
            <thead>
            <tr>
                <td>
                <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
                <td style="padding-left: 10rem;"><label style="font-size: 18px;">Cross Docking Report </label></td>
            </tr>
            </thead>
        </table>
        <hr>
          <table style="width: 100%;">
            <tbody style="font-size: 12px; ">
              <tr>
                  <td>
                    <div>
                      <label>Customer: {{ $item->customer->customer }}</label><br><br>
                      <label>Address:  {{ $item->customer->address }} </label><br><br>
                      @if(blank($item->customer->customer_contact))
                      <label> - </label>
                      @else
                      <label>Contact Number:  @foreach($item->customer->customer_contact as $contact)
                        {{ $contact->contact_number }} /
                        @endforeach
                      </label><br>
                      @endif
                    </div>  
                  </td>
                  <td>
                    <div>
                      <label>CROSS-DOCKING Number: CDR{{ $item->wr_number }}  </label><br><br>
                      <label>Date: {{ $item->wr_date}} </label><br><br>
                      <label>Vehicle/ Container No: ***** </label><br>
                    </div>  
                  </td>
              </tr>
            </tbody>
          </table>
          <br>
          <table style="width: 100%;">
            <thead style="font-size: 14px;" class="table-list">
              <tr>
                <td>Item</td>
                <td>Code</td>
                <td>Material Desc</td>
                <td>Quantity</td>
                <td>Weight</td>
                <td>Unit</td>
                <td>Volume</td>
                <td>Pallet</td>
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
              @if(blank($item->warehouse_receiving_items)) {}
                <tr>
                  <td colspan="7" style="text-align: center;"> No Records Found</td>
                </tr>
              @else
                @foreach($item->warehouse_receiving_items as $items) {}
                <tr>
                  <td>{{ $items->customer_material->material }}</td>
                  <td>{{ $items->customer_material->code }}</td>
                  <td>{{ $items->customer_material->particulars }}</td>
                  <td>{{ $items->quantity }}</td>
                  <td>{{ $items->weight }}</td>
                  <td>{{ $items->unit }}</td>
                  <td>{{ $items->volume }}</td>
                  <td>{{ round(($items->weight / 1000), 2) }}</td>
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
              </tr>
            </tbody>
          </table>
          <br>
          <table style="width: 100%;">
            <tbody style="font-size: 12px; ">
              <tr>
                  <td>
                    <div>
                      <label>Prepared By: {{ $item->prepared_by_user->name }} </label> &nbsp; &nbsp;
                      <label>Checked By: {{ $item->checked_by_user->name }} </label> &nbsp; &nbsp;
                      <label>Certified True & Correct By: {{ $item->approved_by_user->name }} </label> &nbsp; &nbsp;
                    </div>  
                  </td>
                <td></td>
                <td></td>
                <td>
                </td>
              </tr>
            </tbody>
          </table>
          
          <div style="position:absolute; bottom: 0; width: 100%;">
            <div style="display: flex;">
              <div style="margin-top: 20px;">
                <label for="document_no" style="float: left;">Document No. {{ $item->id }}</label>
                <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
              </div>
            </div>
          </div>

        @if($loop->index != (count($data) - 1))
          <div class="page-break"></div>
        @endif
      </div>
    @endforeach
  @endif
@endsection