@extends('layouts.app')

@section('content')
  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead style="font-size: 10px; ">
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Physical Count Sheet</label></td>
        </tr>
        </thead>
    </table>
    <hr>
    @if(blank($data))
    <table style="width: 100%;">
      <tbody style="font-size: 14px; ">
        <tr>
          <td style="text-align: center;"> 
            No Record Found
          </td>
        </tr>
      </tbody>
    </table>
    @else
    <table style="width: 100%;">
      <tbody style="font-size: 10px; ">
        <tr>
            <td>
              <div>
                <label>PC No: {{ $data[0]->physical_count->pc_number }} </label><br>
                <label>Customer: {{ $data[0]->physical_count->customer->customer }} </label><br>
                <label>Address: {{ $data[0]->physical_count->customer->address }} </label><br>
                @if(blank($data[0]->physical_count->customer->customer_contact)) 
                <label> - </label> <br>
                @else
                <label>Email: @foreach($data[0]->physical_count->customer->customer_contact as $email) 
                                  {{ $email->email }} / 
                              @endforeach
                </label><br>
                @endif
              </div>  
          </td>
          <td>
            <div>
              <label></label><br>
              <label></label><br>
              <label>Warehouse: {{ $data[0]->physical_count->warehouse->warehouse }} </label><br>
              <label>Date :  {{ $data[0]->physical_count->pc_date }} </label><br>
            </div>  
          </td>
        </tr>
      </tbody>
    </table>

    <table style="width: 100%;">
      <thead style="font-size: 10px;" class="table-list">
        <tr>
          <td colspan="19"</td>
          <td colspan="4">Average Percentage</td>
          <td colspan="1" style="text-align: center;">{{ $percentage['average']}}%</td>
        </tr>
        <tr>
          <td colspan="19"</td>
          <td colspan="5">Percentage Accuracy</td>
        </tr>
        <tr>
          <td colspan="19"</td>
          <td >{{ $percentage['item']}}% </td>
          <td >{{ $percentage['expiry']}}%</td>
          <td >{{ $percentage['pallet']}}%</td>
          <td >{{ $percentage['qty']}}%</td>
          <td >{{ $percentage['weight']}}%</td>
        </tr>
      </thead>
      <thead style="font-size: 10px;" class="table-list">
        <tr>
          <td colspan="10" style="text-align: center;">Berben System</td>
          <td colspan="7" style="text-align: center;">Actual Count</td>
          <td colspan="7" style="text-align: center;">Count Analysis</td>
        </tr>
      </thead>
      <thead style="font-size: 8px;" class="table-list">
        <tr>
          <td>code</td>
          <td>Item</td>
          <td>Batch</td>
          <td>Expiry</td>
          <td>WR Date</td>
          <td>UOM1</td>
          <td>UOM2</td>
          <td>Pallet</td>
          <td>Bin</td>
          <td>Weight</td>

          <td>Expiry</td>
          <td>Bin</td>
          <td>Weight</td>
          <td>UOM1</td>
          <td>Qty</td>
          <td>UOM2</td>
          <td>Qty</td>

          <td>Total Wt</td>
          <td>Accum</td>
          <td>Item</td>
          <td>Expiry</td>
          <td>Pallet</td>
          <td>Qty</td>
          <td>Weight</td>

        </tr>
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
      <tbody style="font-size: 8px;">
      @foreach($data as $item)
          <tr>
            <td> {{ $item->inventory_item->customer_material->material_type->code }}</td>
            <td> {{ $item->inventory_item->customer_material->material }} </td>
            <td> {{ $item->inventory_item->batch_number }}</td>
            <td> {{ $item->inventory_item->expiry_date }} </td>
            <td> {{ $item->inventory_item->warehouse_receiving->wr_date }} </td>
            <td> {{ $item->inventory_item->customer_material->unit1 }} </td>
            <td> {{ $item->inventory_item->customer_material->unit2 }} </td>
            <td> {{ $item->inventory_item->inventory_pallet->pallet_number }} </td>
            <td> {{ $item->inventory_item->inventory_pallet->storage_room_bin->storage_bin_number }}</td>
            <td> {{ $item->weight }} </td>

            @if($item->actual_weight != 0 && $item->actual_quantity != 0 && $item->actual_volume !== 0)

            <td> {{ $item->actual_expiry_date }} </td>
            <td> {{ $item->inventory_item->inventory_pallet->storage_room_bin->storage_bin_number }} </td>
            <td> {{ $item->actual_weight }} </td>
            <td> {{ $item->unit }} </td>
            <td> {{ $item->inventory_item->quantity }} </td>
            <td> {{ $item->actual_unit }} </td>
            <td> {{ $item->actual_quantity }} </td>
            <td> {{ $item->actual_weight }}  </td>
            
            <td> {{ $item->actual_weight }} </td>
            <td> {{ ($item->actual_weight != 0 || $item->inventory_item->quantity != 0 || $item->actual_quantity != 0) ? 'Ok' : 'Fail' }}  </td>
            <td> {{ ($item->actual_weight != 0) ? 'Ok' : 'Fail' }} </td>
            <td> {{ ($item->actual_weight != 0) ? 'Ok' : 'Fail' }} </td>
            <td> {{ ($item->actual_weight == $item->inventory_item->warehouse_receiving->total_weight) ? 'Ok' : 'Fail' }} </td>
            <td> {{ ($item->actual_weight == $item->inventory_item->warehouse_receiving->total_weight) ? 'Ok' : 'Fail' }} </td>
            @else 
            <td>  </td>
            <td>  </td>
            <td>  </td>
            <td>  </td>
            <td>  </td>
            <td>  </td>
            <td>  </td>
            <td>  </td>
            
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            @endif
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
      </tbody>
    </table>

    <br>

    <br>
    <label>
      Note Counted : 
    </label> 
    <br>
    <br> 
    <table style="width: 100%;">
      <tbody style="font-size: 10px; ">
        <tr>
            <td>
              <div>
                <label>Remarks: {{ $data[0]->physical_count->remarks }} </label><br><br>
                <label>Prepared By: {{ $data[0]->physical_count->prepared_by_user->name }} </label> &nbsp; &nbsp;
                <label>Checked By: {{ $data[0]->physical_count->checked_by_user->name }} </label> &nbsp; &nbsp;
                <label>Approved  By: {{ $data[0]->physical_count->approved_by_user->name }} </label> &nbsp; &nbsp;
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
  @endif
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