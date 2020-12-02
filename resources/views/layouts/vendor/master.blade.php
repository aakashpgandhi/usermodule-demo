<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Vendors - @yield('title')</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('admin/images/favicon-16x16.png') }}">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/morris/morris.css') }}">

    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- <link rel="stylesheet" id="css-main" href="{{ asset('css/toastr.css') }}"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('admin/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('admin/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        .error {
            border-color: #dc3545;
            color: #dc3545;
            font-size: 80%;
        }

        .success {
            border-color: #28a745;
        }

    </style>
</head>


<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.vendor.sidebar')
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <!-- Top Bar Start -->
                @include('layouts.vendor.header')
                <!-- Top Bar End -->

                <div class="page-content-wrapper ">

                    @yield('content')
                    <!-- container fluid -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->
            @include('layouts.vendor.footer')

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->

    <input type="hidden" id="appname" name="appname" value="{{ config('app.name') }}">

    <!-- jQuery  -->
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script>
        var appName = $('#appname').val();

    </script>

    <script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/additional-methods.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('admin/js/detect.js') }}"></script>
    <script src="{{ asset('admin/js/fastclick.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('admin/js/waves.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.scrollTo.min.js') }}"></script>
    <!-- skycons -->
    <script src="{{ asset('admin/plugins/skycons/skycons.min.js') }}"></script>
    <!-- skycons -->
    <script src="{{ asset('admin/plugins/peity/jquery.peity.min.js') }}"></script>
    <!--Morris Chart-->
    <script src="{{ asset('admin/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/raphael/raphael-min.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin/js/toastr.min.js') }}"></script>


    <script src="{{ asset('admin/js/app.js') }}"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script> -->
    <!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script> -->

    <!-- <script>

    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();

</script> -->
    @yield('js')
</body>

</html>
