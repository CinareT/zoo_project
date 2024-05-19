<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.includes.head')
    @stack('css')

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/assets/dist/css/adminlte.min.css')}}">
    <!-- custom -->
    <link rel="stylesheet" href="{{asset('admin/assets/custom.css')}}">
    <title>@stack('title',"Admin Control Zoo Park")</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('admin.layouts.includes.preloader')

        <x-admin-nav />


        @include('admin.layouts.includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->


        <x-admin-footer />
    </div>
    <!-- ./wrapper -->
    @include('admin.layouts.includes.foot')
    @stack('js')
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/assets/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/assets/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('admin/assets/dist/js/pages/dashboard.js') }}"></script>
</body>

</html>