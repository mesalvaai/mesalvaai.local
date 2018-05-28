<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>{{ $title }}</title>

	<base href="{{ URL::asset('/') }}" target="_blank">
	<link rel="icon" href="img/core-img/favicon.ico">
	{{-- <link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}"> --}}
	<link rel="stylesheet" href="{{ url('bootstrap/style.css') }}">
	{{-- <link rel="stylesheet" href="{{ url('cashback/css/main-green.css') }}"> --}}
	<link rel="stylesheet" href="{{ url('bootstrap/css/responsive.css') }}">
	{{-- <link rel="stylesheet" href="{{ url('effects/effects.min.css') }}"> --}}
	<link rel="stylesheet" href="{{ url('ihover/ihover.css') }}">
	<link rel="stylesheet" href="{{ url('bootstrap/css/imagesHover.css') }}">
	<!-- Scrollbar Custom CSS -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css"> --}}


	<!-- Jquery-2.2.4 JS -->
    <script src="{{ url('bootstrap/js/jquery-2.2.4.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script> --}}

</head>
<body>
	{{-- Header Section --}}
	@yield('header')
	
	{{-- Contente Include --}}

	@yield('content')
	
	
	

	{{-- Footer section --}}
	@yield('footer')
	
    <!-- Popper js -->
    <script src="{{ url('bootstrap/js/popper.min.js') }}"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- All Plugins JS -->
    <script src="{{ url('bootstrap/js/plugins.js') }}"></script>
    <!-- Slick Slider Js-->
    <script src="{{ url('bootstrap/js/slick.min.js') }}"></script>
    <!-- Footer Reveal JS -->
    <script src="{{ url('bootstrap/js/footer-reveal.min.js') }}"></script>
    <!-- Active JS -->
    <script src="{{ url('bootstrap/js/active.js') }}"></script>
    <!-- jQuery Custom Scroller CDN -->

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script> --}}
    <script type="text/javascript">
	    $("a#remove-show").click(function() {
	  		$("div").removeClass('show');
		});
	</script>

	<script type="text/javascript">
            $ (document).ready (function () {
				$ (".modal a").not (".dropdown-toggle").on ("click", function () {
					$ (".modal").modal ("hide");
				});
			});
        </script>
</body>
</html>