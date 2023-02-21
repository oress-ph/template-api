@extends('layouts.app')

@section('content')
<div style="width: 100%;">
    <table style="width: 100%;">
        <thead>
            <tr>
                <td>
                    <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100">
                </td>
                <td style="padding-left: 10rem;"><label style="font-size: 18px;">CY Status Report Report</label></td>
            </tr>
        </thead>
    </table>
    <hr>
    <table style="width: 100%;">
        <tbody style="font-size: 12px; ">
            <tr>
                <td>
                    <div>
                        <label>Branch:{{ $branch->branch }}</label><br>
                        <label>Current Time: {{ date("h:ia") }}</label><br>
                        <br>
                        <label>Incoming Trucks:</label><br>
                        <label>Arrived Trucks:</label><br>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <table style="width: 100%;">
        <thead style="font-size: 14px; " class="table-list">
            <tr>
                <td>Warehouse</td>
                <td>Loading Docks</td>
                <td>Type</td>
                <td>Customer</td>
                <td>Container No.</td>
                <td>Size</td>
                <td>Start Time</td>
                <td>End Time</td>
                <td>Process Type</td>
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
            @if($loading_docks->count() == 0)
            <tr>
                <td colspan="9" style="text-align: center">
                    No Record Found
                </td>
            </tr>
            @else
            @foreach ($loading_docks as $data)
                @if($data->truck_arrival != null)
                    <tr>
                        <td>{{ $data->loading_dock->warehouse ? $data->loading_dock->warehouse->warehouse : '-' }}</td>
                        <td>{{ $data->loading_dock ? $data->loading_dock->loading_dock : '-' }}</td>
                        <td>{{ $data->loading_dock ? $data->loading_dock->loading_dock_type : '-' }}</td>
                        <td>{{ $data->truck_arrival->customer ? $data->truck_arrival->customer->customer : '-' }}</td>
                        <td>{{ $data->truck_arrival ? $data->truck_arrival->container_number : '-' }}</td>
                        <td>{{ $data->truck_arrival ? $data->truck_arrival->container_size : '-' }}</td>
                        <td>{{ $data->start_loading_time ? $data->start_loading_time : '-' }}</td>
                        <td>{{ $data->end_loading_time ? $data->end_loading_time : '-' }}</td>
                        <td>{{ $data->status ? $data->status : '-' }}</td>
                    </tr>
                @endif
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

    </table>
    <br>
    <div>
        <label>Total Loading Dock:{{ $loading_docks_count }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Occupied:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label>Available:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <br>

        <table style="width: 100%;">
            <thead style="font-size: 14px; " class="table-list">
                <tr>
                    <td>Yard</td>
                    <td>Plugin Station</td>
                    <td>Type</td>
                    <td>Customer</td>
                    <td>Container No.</td>
                    <td>Size</td>
                    <td>Temperature</td>
                    <td>Plugin Time</td>
                    <td>Plugout Time</td>
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
                @if($plugin_stations->count() == 0)
                <tr>
                    <td colspan="9" style="text-align: center">
                        No Record Found
                    </td>
                </tr>
                @else
                @foreach ($plugin_stations as $data)
                    @if($data->truck_arrival != null)
                        <tr>
                            <td>{{ $data->truck_arrival ? $data->truck_arrival->yard_plugin_station->yard->yard : '-' }}</td>
                            <td>{{ $data->truck_arrival ? $data->truck_arrival->yard_plugin_station->plugin_station : '-' }}</td>
                            <td>{{ $data->truck_arrival ? $data->truck_arrival->yard_plugin_station->plugin_station_type : '-' }}</td>
                            <td>{{ $data->truck_arrival->customer ? $data->truck_arrival->customer->customer : '-' }}</td>
                            <td>{{ $data->truck_arrival ? $data->truck_arrival->container_number : '-' }}</td>
                            <td>{{ $data->truck_arrival ? $data->truck_arrival->container_size : '-' }}</td>
                            <td>{{ $data->temperature ? $data->temperature : '-' }}</td>
                            <td>{{ $data->plugin_time ? $data->plugin_time : '-' }}</td>
                            <td>{{ $data->plugout_time ? $data->plugout_time : '-' }}</td>
                        </tr>
                    @endif
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
        </table>
        <br>
        <div>
            <label>Total Plugin Station:{{ $plugin_stations_count }}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Occupied:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>Available:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <br><br>
        <label><u>Note: Pulled out and Plugged out containers in the yard are not included<u></label>

    </div>


    <div style="position:absolute; bottom: 0; width: 100%;">

        <div style="display: flex;">
            <div style="margin-top: 20px;">
                <label for="document_no" style="float: left;">Document No. 13</label>
                <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
            </div>
        </div>

    </div>

    @endsection