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
      font-family: Arial, Helvetica, sans-serif;
    }
    table {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse !important;
      width: 100%;
    }
    td, th {
      border: 1px solid #ddd;
      text-align: left;
      padding: 4px;
      font-size: 12px;
    }

    .remove-border {
      border: none !important;
    }
    .remove-border-left {
      border-left: none !important;
    }
    .remove-border-right {
      border-right: none !important;
    }
    .remove-border-top {
      border-top: none !important;
    }
    .remove-border-bottom {
      border-bottom: none !important;
    }

    .border-right {
      border-left: none !important;
      border-right: 1px solid #ddd;
    }

    .border-left {
      border-left: 1px solid #ddd;
      border-right: none !important;
    }

    .uppercase {
      text-transform: uppercase;
    }

    .text-center {
      text-align: center;
    }

    .text-left {
      text-align: left;
    }

    .header-layout {
      display: inline-block;
    }
    .title {
      font-size: 16px;
      padding-top: 16px;
      padding-left: 25rem;
    }

    .text-xs {
      font-size: 7px;
    }

    .text-sm {
      font-size: 8px;
    }
    .text-md {
      font-size: 11px;
    }
    .text-lg {
      font-size: 18px;
    }

    .text-white {
      color: #fff;
    }

    .text-success {
      color: #268367;
    }

    .text-danger {
      color: #ff0000;
    }

    .bg-secondary {
      backgroud-color: #FF5733;
    }

    @page { margin: 5px; }
    
  </style>
<body>
    @yield('content')
</body>
</html>
