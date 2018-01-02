<!DOCTYPE html>
<html lang="es">
<head>

    @include('includes.head')

</head>
<body>

    <div id="wrapper">
        <!-- Navigation -->
        @include('includes.menu')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('title')</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                @include('flash::message')
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

@include('includes.scripts')
<script>
    $('#flash-overlay-modal').modal();
</script>
@yield('custom_scripts')
</body>
</html>
