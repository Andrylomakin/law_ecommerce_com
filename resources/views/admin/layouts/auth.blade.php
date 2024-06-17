<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/simplebar/simplebar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/tabs.css') }}">
    @yield('style')
</head>


<body>







            @yield('content')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="{{ asset('assets/admin/js/config.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/flatpickr.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/lodash/lodash.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/list.js/list.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/theme.js') }}"></script>
<script src="{{ asset('assets/admin/js/tabs.js') }}"></script>
@yield('scripts')
</body>

</html>
