<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive Laravel Admin Dashboard Template based on Tailwind CSS">
  <meta name="author" content="NobleUI">
  <meta name="keywords"
    content="nobleui, tailwind, admin, dashboard, template, responsive, css, html, laravel, theme, front-end, ui kit, web">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('assets/images/others/busybeesfvicon.png') }}">

  <!-- Page Title -->
  <title>@yield('title') | Trusted Solutions for Modern Businesses</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Alpine.js -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">

  <!-- Plugin CSS -->
  <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />

  @stack('plugin-styles')

  <!-- Common CSS (optional, for your app.css overrides) -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <style>
    html,
    body {
      overflow: auto;
      -ms-overflow-style: none;
      scrollbar-width: none;
      scroll-behavior: smooth;
    }

    html::-webkit-scrollbar,
    body::-webkit-scrollbar {
      display: none;
    }

    .hide-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    .hide-scrollbar::-webkit-scrollbar {
      display: none;
    }
  </style>

  @stack('style')
</head>


<body data-base-url="{{url('/')}}" id="body">

  <script src="{{ asset('assets/js/spinner.js') }}"></script>

  <div class="main-wrapper" id="app">

    @include('layout.sidebar')
    <div class="page-wrapper">
      @include('layout.header')
      <div class="page-content">
        @yield('content')
      </div>
      @include('layout.footer')
    </div>
  </div>

  <!-- base js -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <!-- end base js -->

  <!-- plugin js -->
  @stack('plugin-scripts')
  <!-- end plugin js -->

  <!-- common js -->
  <script src="{{ asset('assets/js/template.js') }}"></script>
  <!-- end common js -->

  @stack('custom-scripts')

</body>

</html>