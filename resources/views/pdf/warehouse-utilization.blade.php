@extends('layouts.app')

@section('content')
<div style="width:100%; padding: 10px;">
<style>
  body {
      font-family: monospace;
    }
  td {
    border-bottom: 1px solid gray;
  }
  .header {
    font-size: 16px;
    text-transform: uppercase;
    margin-bottom: 2rem;
  }

  label {
    font-size: 12px;
  }
</style>
<div style="display: block;">
  <table style="width: 100%;">
    <thead>
      <tr>
        <td>
        <img style="float-left;" src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
        <td style="padding-left: 10rem;"><h4 style="float-right;">Warehouse Utilization Report</h4></td>
      </tr>
    </thead>
  </table>
    <br />
    <label for="start_date">Warehouse: #1</label>
    <br />
    <label for="expiry_date">Address: Sample Address</label>
    <br />
    <label for="expiry_date">As of Date: {{ date('Y/m/d', strtotime(now()))}}</label>
</div>
<br />
    <table style="padding: 10px; width: 100%;">
    <thead style="font-size: 14px; border-top: 1px solid gray;">
        <tr>
            <td>Storage Room</td>
            <td>Storage Type</td>
            <td>Capacity</td>
            <td>Occupied</td>
            <td>% Occupied</td>
            <td>Available</td>
            <td>% Available</td>
        </tr>
    </thead>
    <tbody style="font-size: 12px;">
    <tr>
      <td>Room 1</td>
      <td>Freezer</td>
      <td> 100 kg</td>
      <td> 90 kg</td>
      <td>90%</td>
      <td>10 kg</td>
      <td>10%</td>
    </tr>
    <tr>
      <td>Room 2</td>
      <td>Freezer</td>
      <td> 100 kg</td>
      <td> 100 kg</td>
      <td>100%</td>
      <td>0 kg</td>
      <td>0%</td>
    </tr>
    <tr>
      <td colspan="2">Total Per Storage Type</td>
      <td> 100 kg</td>
      <td> 90 kg</td>
      <td>90%</td>
      <td>10 kg</td>
      <td>10%</td>
    </tr>
    <tr>
      <td colspan="2">Overall Total </td>
      <td> 200 kg</td>
      <td> 190 kg</td>
      <td>95%</td>
      <td>10 kg</td>
      <td>5%</td>
    </tr>
    </tbody>
    </table>
<div style="position:absolute; bottom: 0; width: 100%;">

  <div style="display: flex; border-top: 1px solid #131313;">
    <div style="margin-top: 20px;">
      <label for="document_no" style="float: left;">Document No. </label>
      <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
    </div>
  </div>

</div>
@endsection