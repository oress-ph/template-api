
@extends('layouts.app')

@section('content')
  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Delivery Receipt Variance Report </label></td>
        </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%;">
      <tbody style="font-size: 12px; ">
        <tr>
            <td>
              <div>
                <label>Customer: {{ blank($data) ? '-' : $data[0]->customer->customer }}</label><br><br>
                <label>Address: {{ blank($data) ? '-' : $data[0]->customer->address }}</label><br><br>
                @if(blank($data))
                <label>Contact Number: - </label><br>
                @else
                <label>Contact Number: @foreach($data[0]->customer->customer_contact as $contacts) {{ $contacts->contact_number }} @endforeach</label><br>
                @endif
              </div>  
            </td>
            <td>
              <div>
                <label>Transaction Number: RR{{ blank($data) ? '-' : $data[0]->do_number }} </label><br><br>
                <label>Date: {{ blank($data) ? '-' : $data[0]->do_date }}</label><br><br>
                <label>Vehicle/ Container No: {{ blank($data) ? '-' : $data[0]->container_number }} </label><br>
              </div>  
            </td>
        </tr>
      </tbody>
    </table>
    <br>
    <br>
    <table style="width: 100%;">
      <thead style="font-size: 12px;" class="table-list">
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td colspan="3" style="text-align: center;">Transaction Reference</td>
          <td colspan="3" style="text-align: center;">Actual Transaction</td>
          <td colspan="3" style="text-align: center;">Variance Report +(-)</td>
        </tr>
        <tr>
          <td>Item</td>
          <td>Material Code</td>
          <td>Material Desc</td>
          <td>Quantity</td>
          <td>Unit</td>
          <td>Weight</td>
          <td>Quantity</td>
          <td>Unit</td>
          <td>Weight</td>
          <td>Quantity</td>
          <td>Unit</td>
          <td>Weight</td>
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
            <td></td>
            <td></td>
            <td></td>
        </tr>
      </thead>
      <tbody style="font-size: 12px;">
        @if(blank($data))
        <tr>
          <td colspan="13" style="text-align: center">No Record Found</td>
        </tr>
        @else
          @foreach($data[0]->dispatch_order_items as $items)
          <tr>
            <td>{{ str_pad($loop->index + 1, 3, '0', STR_PAD_LEFT) }}</td>
            <td>{{ $items->inventory_item->customer_material->code }} </td>
            <td>{{ $items->inventory_item->customer_material->material }}  </td>
            <td> {{ $items->pick_list->pick_list_item->quantity }}</td>
            <td> {{ $items->pick_list->pick_list_item->unit }}</td>
            <td> {{ number_format($items->pick_list->pick_list_item->weight, 4, '.', '') }}</td>
            <td>{{ $items->quantity }}</td>
            <td>{{ $items->unit }}</td>
            <td>{{ number_format($items->weight, 4, '.', '') }}</td>
            <td>{{ $items->pick_list->pick_list_item->quantity - $items->quantity }} </td>
            <td>{{ ($items->pick_list->pick_list_item->unit == $items->unit) ? $items->pick_list->pick_list_item->unit : 'Conflict' }}</td>
            <td>{{ number_format(($items->pick_list->pick_list_item->weight - $items->weight), 4, '.', '') }}</td>
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
                <label>Prepared By: {{ blank($data) ? '-' : $data[0]->prepared_by_user->name }} </label> &nbsp; &nbsp;
                <label>Checked By: {{ blank($data) ? '-' : $data[0]->checked_by_user->name }} </label> &nbsp; &nbsp;
                <label>Certified True & Correct By:</label> &nbsp;
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