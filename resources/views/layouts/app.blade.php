<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berben Logistics</title>

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
    label.checkbox {
      display: block;
      padding-left: 10px;
      text-indent: -5px;
    }
    input {
      width: 13px;
      height: 13px;
      padding: 0;
      margin:0;
      vertical-align: bottom;
      position: relative;
      top: -9px;
      *overflow: hidden;
    }

    .page-break {
      page-break-after: always;
    }
    .last-page{
      width: 612px; 
      height: 792px; 
      overflow: hidden; 
      font-family: Arial, Helvetica; 
      position: relative; 
      color: #545554;
    }
    
  </style>
<body>
    @yield('content')
</body>
</html>
