<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.includes.head')
    @stack('css')
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
</body>

</html>