<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Isister - Beast</title>
    <link rel="stylesheet" href="{{ asset('dash/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dash/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('dash/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('dash/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dash/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dash/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dash/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('dash/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      @include('partials.sidebar')
      <div class="container-fluid page-body-wrapper">
        @include('partials.navbar')
        <div class="main-panel">
          @yield('content')
          @include('partials.footer')
        </div>
      </div>
    </div>
    <script src="{{ asset('dash/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('dash/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('dash/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('dash/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('dash/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('dash/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('dash/js/off-canvas.js') }}"></script>
    <script src="{{ asset('dash/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('dash/js/misc.js') }}"></script>
    <script src="{{ asset('dash/js/settings.js') }}"></script>
    <script src="{{ asset('dash/js/todolist.js') }}"></script>
    <script src="{{ asset('dash/js/dashboard.js') }}"></script>
  </body>
</html>