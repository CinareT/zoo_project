<!DOCTYPE html>
<html lang="en">

<head>
    @include('auth.layouts.includes.head')
    <title>Admin Zoo Park</title>
    @stack('css')
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Admin</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                @yield('content')
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    @include('auth.layouts.includes.foot')
    @stack('js')
</body>

</html>