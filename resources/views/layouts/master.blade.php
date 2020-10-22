<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.partials.head')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('admin.partials.header')

            @include('admin.partials.nav')

            @yield('content')
        
            @include('admin.partials.footer')

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        
        @include('admin.partials.footer-scripts')
    </body>
</html>
