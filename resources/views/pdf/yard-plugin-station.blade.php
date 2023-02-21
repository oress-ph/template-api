@extends('layouts.app')

@section('content')
  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Yard Plugin Status Report</label></td>
        </tr>
        </thead>
    </table>
    <hr>
    @foreach ($yard_plugin as $data)
        
        <table style="width: 100%;">
        <tbody style="font-size: 12px; ">
            <tr>
                <td>
                    <div>
                    <label>Yard: {{ $data->yard ? $data->yard : '-' }}</label><br>
            
                    </div>  
            </td>
            </tr>
        </tbody>
        </table>
      
        <table style="width: 100%;">
        <thead style="font-size: 14px; " class="table-list">
            <tr>
              <td>Plugin Station</td>
              <td>Particulars</td>
              <td>Type</td>
              <td>Status</td>
              <td>TA No.</td>
              <td>Customer</td>
              <td>Container No.</td>
              <td>Size</td>
              <td>Plugin Time</td>
              <td>Plugout Time</td>
              <td>Temperature</td>
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
            </tr>
            </thead>
            <tbody style="font-size: 12px;">
              @if($data->yards->isEmpty())
                <tr>
                  <td colspan="15" style="text-align: center">
                      No Record Found
                  </td>
                </tr>
              @else
                @foreach ($data->yards as $item)
                  @foreach ($item->plugin_stations as $ta)
                    @if($ta->truck_arrival->ta_number)
                      <tr>
                          <td>{{ $item->plugin_station ? $item->plugin_station : '-' }}</td>
                          <td>{{ $item->particulars ? $item->particulars : '-' }}</td>
                          <td>{{ $item->plugin_station_type ? $item->plugin_station_type : '-'}}</td>
                          <td>{{ $item->status ? $item->status : '-' }}</td>
                          <td>{{ $ta->truck_arrival ? $ta->truck_arrival->ta_number : '-' }}</td>
                          <td>{{ $ta->truck_arrival ? $ta->truck_arrival->customer->customer : '-' }}</td>
                          <td>{{ $ta->truck_arrival ? $ta->truck_arrival->container_number : '-' }}</td>
                          <td>{{ $ta->truck_arrival ? $ta->truck_arrival->container_size : '-' }}</td>
                          <td>{{ $ta->plugin_time ? $ta->plugin_time : '-' }}</td>
                          <td>{{ $ta->plugout_time ? $ta->plugout_time : '-' }}</td>
                          <td>{{ $ta->temperature ? $ta->temperature : '-' }}</td>
                      </tr>
                    @else
                      <tr>
                        <td colspan="15" style="text-align: center">
                            No Record Found
                        </td>
                      </tr>
                    @endif
                  @endforeach
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
            </tr>
    
        </table>
    @endforeach
    <br>
  </div>

<div style="position:absolute; bottom: 0; width: 100%;">

  <div style="display: flex;">
    <div style="margin-top: 20px;">
      <label for="document_no" style="float: left;">Document No. 12</label>
      <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
    </div>
  </div>

</div>

  @endsection