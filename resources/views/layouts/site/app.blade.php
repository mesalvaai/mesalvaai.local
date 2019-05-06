<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>{{ ucfirst($title) ?? 'Me salva aí' }}</title>
  <meta property="og:image" content="{{ ucfirst($image ?? url('/site/img/msa/slides/slide9.jpg')) }}" />
  <meta property="og:title" content="{{ ucfirst($title ?? 'mesalvaai.com') }}" />
  <meta property="og:description" content="{{ ucfirst($description ?? 'Visite mesalvaai.com') }}" />
  <meta property="og:url" content="{{ ucfirst(URL::current() ?? '') }}" />
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

  <link href="{{ asset('site/lib/OwlCarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('site/lib/OwlCarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
  <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('site/css/msa.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('site/css/sty.css') }}">
  <style type="text/css">
    /*#owl-demo .owl-item div{
      padding:5px;
    }
    #owl-demo .owl-item img{
      display: block;
      width: 100%;
      height: auto;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
    }*/
    /*.caption {
      position: absolute;
      font-size: 1.5em;
      top: 0;
      left: 15px;
      border:1px solid;
      color:orange;
      text-shadow: 2px 2px 1px #000;
      width:100%;
    }*/

  </style>

  @yield('styles')
</head>

<body>

  <!--==========================
    Header
    ============================-->
    @include('layouts.site.partials.menu', ['some' => 'data'])
    <!-- #header -->

    
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
    <script type="text/javascript" src="{{ asset('site/lib/OwlCarousel/owl.carousel.min.js') }}"></script>
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

    <script type="text/javascript">
        $(document).ready(function() {

              $("#owl-demo").owlCarousel({
                loop:true,
                autoplay: true,
                autoplayTimeout: 3500,
                margin:0,
                responsiveClass:true,
                responsive:{
                  0:{
                    items:1,
                    nav:false
                  },
                  600:{
                    items:1,
                    nav:false
                  },
                  1000:{
                    items:1,
                    nav:false,
                    loop:false
                  }
                }
                // autoPlay : 3000,
                // stopOnHover : true,
                // navigation:true,
                // paginationSpeed : 1000,
                // goToFirstSpeed : 2000,
                // singleItem : true,
                // autoHeight : true,
                // transitionStyle:"fade"
            });

            $('#myCarousel').carousel({
                interval: 6000,
            })

        });
    </script>
  </body>
  </html>
