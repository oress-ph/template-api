<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Services</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<style>
    body {
      font-family: monospace;
    }
    thead.table-list > tr.border-dash > td {
      border-bottom: 1.5px dashed gray;
      padding-top: 2px !important;
    }
    tr.border-dash > td {
      border-bottom: 1.5px dashed gray;
      padding-top: 4px !important;
    }
    td {
      padding-left: 10px;
      padding-top: 9px;
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
<body>
<div style="width: 100%;">
  <table style="width: 100%;">
    <thead>
      <tr>
        <td>
        <img src="{{ public_path('images/berben.png') }}" alt="" width="100" heigth="100"></td>
        <td style="padding-left: 10rem;"><label style="font-size: 18px;">List of Services </label></td>
      </tr>
    </thead>
  </table>
        <table style="width: 100%;">
          <thead style="font-size: 14px;" class="table-list">
            <tr class="tr-head">
              <td>Sercice Code </td>
              <td>Service </td>
              <td>Unit of Measurement </td>
              <td>Service Desc </td>
              <td>Customer Type </td>
              <td>Price </td>
              <td>Status </td>
            </tr>

            <tr class="border-dash">
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
            </tr>

          </thead>
          <tbody style="font-size: 12px;">
          @foreach($services as $service) <tr>
                  <td>{{ $service->code }}</td>
                  <td>{{ $service->service_group }}</td>
                  <td>{{ $service->service }}</td>
                  <td>{{ $service->particulars }}</td>
                  <td>{{ $service->customer_type }}</td>
                  <td style="text-align: right">{{number_format($service->price, 4)}}</td>
                  <td>{{ $service->status }}</td>
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
                  </tr>
          </tbody>
        </table>
    <div style="position:absolute; bottom: 0; width: 100%;">

      <div style="display: flex;">
        <div style="margin-top: 20px;">
          <label for="document_no" style="float: left;">Document No. 2</label>
          <label for="document_no" style="float: right;">Date Printed: {{ date('Y/m/d', strtotime(now()))}}</label>
        </div>
      </div>

    </div>
</body>
</html>

