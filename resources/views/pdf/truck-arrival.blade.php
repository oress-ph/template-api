@extends('layouts.app')

@section('content')
@php($total_days = 0)
@php($total_hrs = 0)
@php($total_mins = 0)
@php($total_secs = 0)


  <div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
        <tr>
            <td>
            <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
            <td style="padding-left: 10rem;"><label style="font-size: 18px;">Container Van Monitoring Report (TA Report)</label></td>
        </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%;">
      
      <tbody style="font-size: 12px; ">
        <tr>
          @foreach($truck_arrival as $ta)
            <td>
              <div>
                  <label>TA No.:{{ $ta->ta_number ? $ta->ta_number : '-' }}</label><br>
                  <label>TA Date:{{ $ta->ta_date ?  $ta->ta_date : '-' }}</label><br>
                  <label>Customer:{{ $ta->customer->customer ? $ta->customer->customer : '-' }}</label><br>
                  <label>Container Number:{{ $ta->container_number ? $ta->container_number : '-' }}</label><br>
                  <label>Trucking Company:{{ $ta->trucking_company ? $ta->trucking_company : '-' }}</label><br>
              </div>  
          </td>
          <td>
            <div>
              <label></label><br>
              <label></label><br>
              <label>Container Size:{{ $ta->container_size ? $ta->container_size : '-' }}</label><br>
              <label>Container Type:{{ $ta->container_type ? $ta->container_type : '-' }}</label><br>
              <label>Temperature:{{ $ta->temperature ? $ta->temperature : '-' }}</label><br>
              <label></label><br>
              <label></label><br>
              <label></label><br>
            </div>  
          </td>
          @endforeach
        </tr>
        <tr> 
          @foreach($TAPlug as $plug)
          @foreach($plug->truck_arrival_plugin_station as $data)
            <td>
                <div>
                    <label>Arrival Information</label><br>
                    <label>-------------------------</label><br>
                    <label>Slip No.:{{ $data->slip_number ? $data->slip_number : '-' }} </label><br>
                    <label>Delivery Type:{{ $plug->arrival_delivery_type ? $plug->arrival_delivery_type : '-' }}</label><br>
                    <label>Delivery No.:{{ $plug->arrival_delivery_no ? $plug->arrival_delivery_no : '-' }}</label><br>
                    <label>Date/Time:{{ $plug->arrival_time ? $plug->arrival_time : '-' }}</label><br>
                    <label>Seal No.:{{ $plug->arrival_seal_no ? $plug->arrival_seal_no : '-' }}</label><br>
                    <label>Driver:{{ $plug->arrival_driver ? $plug->arrival_driver : '-' }}</label><br>
                    <label>Helper:{{ $plug->arrival_helper ? $plug->arrival_helper : '-' }}</label><br>
                    <label>Received By:{{ $plug->prepared_by_user->name ? $plug->prepared_by_user->name : '-' }}</label><br>
                </div>
            </td>
            <td>
                <div>
                    <label>Pull-out Information</label><br>
                    <label>-------------------------</label><br>
                    <label>Slip No.:{{ $data->slip_number ? $data->slip_number : '-' }}</label><br>
                    <label>Delivery Type:{{ $plug->departure_delivery_type ? $plug->departure_delivery_type : '-' }}</label><br>
                    <label>Delivery No.:{{ $plug->arrival_delivery_no ? $plug->arrival_delivery_no : '-' }}</label><br>
                    <label>Date/Time:{{ $plug->departure_time ? $plug->departure_time : '-' }}</label><br>
                    <label>Seal No.:{{ $plug->departure_seal_no ? $plug->departure_seal_no : '-' }}</label><br>
                    <label>Driver:{{ $plug->departure_driver ? $plug->departure_driver : '-' }}</label><br>
                    <label>Helper:{{ $plug->departure_helper ? $plug->departure_helper : '-' }}</label><br>
                    <label>Released By:{{ $plug->prepared_by_user->name ? $plug->prepared_by_user->name : '-' }}</label><br>
                </div>
            </td>
            @endforeach
            @endforeach
        </tr>
      </tbody>
    </table>
    <div style="page-break-inside:avoid; page-break-after:always;"></div>
    <table style="width: 100%;">
      <thead style="font-size: 14px; padding: 0px" class="table-list">
        <tr>
           <td>Slip No.</td>
            <td>Yard</td>
            <td>Plugin Station</td>
            <td>Temperature</td>
            <td>Startup Temp.</td>
            <td>Plugin Time</td>
            <td>Tech</td>
            <td>Remarks</td>
            <td>Plugout Time</td>
            <td>Temperature</td>
            <td>Total Hrs.</td>
            <td>Tech</td>
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
        </tr>
      </thead>
      <tbody style="font-size: 12px;">
        @foreach($truck_arrival as $ta)
        @foreach($ta->truck_arrival_plugin_station as $data)
        @php( $diff = abs( strtotime($data->plugout_time) - strtotime($data->plugin_time) ) )
        @php( $ddss =  $diff          % 86400 )
        @php( $dd   = ($diff - $ddss) / 86400 )
        @php( $hhss =  $ddss          %  3600 )
        @php( $hh   = ($ddss - $hhss) /  3600 )
        @php( $mmss =  $hhss          %    60 )
        @php( $mm   = ($hhss - $mmss) /    60 )
        @php( $ss   =  $mmss          %    60 )
        
        @php($data->plugout_time!= "0000-00-00 00:00:00" ? $total_days+=$dd : "" )
        @php($data->plugout_time!= "0000-00-00 00:00:00" ? $total_hrs+=$hh : "" )
        @php($data->plugout_time!= "0000-00-00 00:00:00" ? $total_mins+=$mm : "" )
        @php($data->plugout_time!= "0000-00-00 00:00:00" ? $total_secs+=$ss : "" )
        <tr>
         
            <td>{{ $data->slip_number ? $data->slip_number : '-' }}</td>
            <td>{{ $data->plugin_station ? $data->plugin_station->yard->yard : '-' }}</td>
            <td>{{ $data->plugin_station ? $data->plugin_station->plugin_station : '-' }}</td>
            <td>{{ $data->temperature ? $data->temperature : '-'}}</td> 
            <td>{{ $data->startup_temperature ? $data->startup_temperature : '-' }}</td>
            <td>{{ $data->plugin_time ? $data->plugin_time : '-' }}</td>
            <td>{{ $data->reefer_technician ? $data->reefer_technician : '-' }}</td>
            <td>{{ $data->remarks ? $data->remarks : '-' }}</td>
            <td>{{ $data->plugout_time ? $data->plugout_time :'-' }}</td>
            <td>{{ $data->temperature ? $data->temperature : '-' }}</td>
            <td>{{ $data->plugout_time!= "0000-00-00 00:00:00" ? $dd." Days ".$hh." Hrs ".$mm." Mins " : "0 Days 0 Hrs 0 Mins" }}</td>
            <td>{{ $data->reefer_technician ? $data->reefer_technician : '-' }}</td>
            <td>{{ $data->remarks ? $data->remarks : '-' }}</td>
         
          </tr>
          @endforeach
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
        </tr>
          
          
      </tbody>
      
    </table>  
    <br>
    <table style="width: 100%;">
      <thead style="font-size: 14px; padding: 0px" class="table-list">
        <tr>
           <td>Slip No.</td>
            <td>Warehouse Loading Dock</td>
            <td>Schedule Time</td>
            <td>Start Loading Time</td>
            <td>End Loading Time</td>
            <td>Total Hrs.</td>
           
        </tr>
        <tr class="border-dash">
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
            
        </tr>
      </thead>
      <tbody style="font-size: 12px;">
        @foreach($TAWarehouse as $wa)
        @foreach($wa->truck_arrival_loading_dock as $data)

        @php( $diff = abs( strtotime($data->end_loading_time) - strtotime($data->start_loading_time) ) )
        @php( $ddss =  $diff          % 86400 )
        @php( $dd   = ($diff - $ddss) / 86400 )
        @php( $hhss =  $ddss          %  3600 )
        @php( $hh   = ($ddss - $hhss) /  3600 )
        @php( $mmss =  $hhss          %    60 )
        @php( $mm   = ($hhss - $mmss) /    60 )
        @php( $ss   =  $mmss          %    60 )

        
        @php($data->end_loading_time!= "0000-00-00 00:00:00" ? $total_days+=$dd : "" )
        @php($data->end_loading_time!= "0000-00-00 00:00:00" ? $total_hrs+=$hh : "" )
        @php($data->end_loading_time!= "0000-00-00 00:00:00" ? $total_mins+=$mm : "" )
        @php($data->end_loading_time!= "0000-00-00 00:00:00" ? $total_secs+=$ss : "" )


        <tr>
            <td>{{ $data->slip_number ? $data->slip_number : '-' }}</td>
            <td>{{ $data ? $data->loading_dock->loading_dock : '-' }}</td>
            <td>{{ $data->scheduled_loading_time ? $data->scheduled_loading_time : '-' }}</td>
            <td>{{ $data->start_loading_time ? $data->start_loading_time : '-' }}</td> 
            <td>{{ $data->end_loading_time ? $data->end_loading_time : '-' }}</td>

            <td>{{ $data->end_loading_time!= "0000-00-00 00:00:00" ? $dd." Days ".$hh." Hrs ".$mm." Mins " : "0 Days 0 Hrs 0 Mins" }}</td>

          </tr>
          @endforeach
          @endforeach
          <tr class="border-dash">
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
  <br>
  <p style="font-size: 12px; ">Container/Vehicle Dwell Time: {{$total_days." Days ".$total_hrs." Hrs ".$total_mins." Mins "}}</p>
  
<div style="position:absolute; bottom: 0; width: 100%;">
  <div style="display: flex;">
    <div style="margin-top: 20px;">
      <label for="document_no" style="float: left;">Document No. 10</label>
      <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
    </div>
  </div>
</div>

  @endsection