@php
function formatRouteName($routeName) {
$prefix = 'admin.';
if (Str::startsWith($routeName, $prefix)) {
$routeName = Str::after($routeName, $prefix);
}
if ($routeName == 'index') $routeName = 'dashboard';
$readableName = Str::title(str_replace(['.', '_'], ' ', $routeName));

return $readableName;
}
@endphp

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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row justify-content-between">
                        <div class="col-sm-4">
                            <h1>
                                {{formatRouteName(request()->route()->getName())}}
                            </h1>
                        </div>
                        @if (session('message'))
                        <div class="col-sm-5 text-right">
                            <div class="alert alert-{{session('type')}} alert-dismissible mb-0 ml-auto w-fit-content">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <p class="m-0">
                                    <strong>Alert: </strong> {!!session('message')!!}
                                </p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </section>
            <section class="content">
                @yield('content')
            </section>
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