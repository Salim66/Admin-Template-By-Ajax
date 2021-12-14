<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  @include('backend.layouts.head')

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('backend.layouts.top-navbar')


    @include('backend.layouts.main-sidebar')

    @section('content')
    @show


    @include('backend.layouts.customizer')



    </div>
    <!-- demo chat-->
    {{-- @include('backend.layouts.chart') --}}

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('backend.layouts.footer')


    @include('backend.layouts.partials.scripts')

  </body>
  <!-- END: Body-->

</html>
