<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>ME SALVA AI</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('site/favicon/favicon.ico') }}" rel="icon">
  <link href="{{ asset('site/favicon/apple-icon-57x57.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('site/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('site/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('site/lib/@fortawesome/fontawesome-free/css/all.css') }}">
  <link href="{{ asset('site/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('site/lib/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('site/lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">


  <!-- Main Stylesheet File -->
  <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('site/css/msa.css') }}">

  @yield('styles')
</head>

<body>

  <!--==========================
    Header
  ============================-->
  @include('layouts.site.partials.menufc', ['some' => 'data'])
  <!-- #header -->
  @include('layouts.site.partials.sub-menu-fc', ['some' => 'data'])

  
  @yield('content')

  <!--==========================
    Footer
  ============================-->
  @include('layouts.site.partials.footer', ['some' => 'data'])
  <!-- #footer -->

  

  <!-- JavaScript Libraries -->
  <script src="{{ asset('site/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('site/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('site/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('site/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('site/lib/aos/aos.js') }}"></script>
  <script src="{{ asset('site/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('site/lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('site/lib/magnific-popup/magnific-popup.min.js') }}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('site/contactform/contactform.js') }}"></script>
 
  <!-- Template Main Javascript File -->
  <script src="{{ asset('site/js/main.js') }}"></script>
  
    @yield('scripts')
</body>
</html>
