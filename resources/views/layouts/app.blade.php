<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" href="{{ asset('backend/') }}/app-assets/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/') }}/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/') }}/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/') }}/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/') }}/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/') }}/app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/') }}/app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/') }}/app-assets/css/themes/semi-dark-layout.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/') }}/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/') }}/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/') }}/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <div id="app">

        @yield('content')

    </div>


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('backend/') }}/app-assets/vendors/js/vendors.min.js"></script>
    <script src="{{ asset('backend/') }}/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js"></script>
    <script src="{{ asset('backend/') }}/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js"></script>
    <script src="{{ asset('backend/') }}/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('backend/') }}/app-assets/js/scripts/configs/vertical-menu-light.min.js"></script>
    <script src="{{ asset('backend/') }}/app-assets/js/core/app-menu.min.js"></script>
    <script src="{{ asset('backend/') }}/app-assets/js/core/app.min.js"></script>
    <script src="{{ asset('backend/') }}/app-assets/js/scripts/components.min.js"></script>
    <script src="{{ asset('backend/') }}/app-assets/js/scripts/footer.min.js"></script>
    <script src="{{ asset('backend/') }}/app-assets/js/scripts/notify.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
     <!-- notify -->
    @if(session()->has('success'))
    <script text="text/javascript">
        $(function(){
            $.notify("{{session()->get('success')}}", {globalPosition: 'top right', className:'success'});
        });
    </script>
    @endif
    @if(session()->has('error'))
    <script text="text/javascript">
        $(function(){
            $.notify("{{session()->get('error')}}", {globalPosition: 'top right', className:'error'});
        });
    </script>
    @endif
    @if(session()->has('warning'))
    <script text="text/javascript">
        $(function(){
            $.notify("{{session()->get('warning')}}", {globalPosition: 'top right', className:'warning'});
        });
    </script>
    @endif

</body>
</html>
