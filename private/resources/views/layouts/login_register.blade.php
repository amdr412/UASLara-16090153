<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Aplikasi Pemetaan</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./public/admin/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./public/admin/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./public/admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./public/admin/images/favicon.png" />
</head>

<body>
  @yield('content')
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="./public/admin/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="./public/admin/js/off-canvas.js"></script>
  <script src="./public/admin/js/hoverable-collapse.js"></script>
  <script src="./public/admin/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
