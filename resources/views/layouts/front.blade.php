<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="{{$config->description}}" />

		<title>
			SAP - @yield('title')
		</title>
		{{-- <link rel="icon" type="image/jpg" href="{{asset('img/design/pepe1.png')}}"/> --}}

		{{-- Estilos de bootstrap --}}
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		{{-- Estilos de slicks --}}
		
		{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
		{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		{{-- Iconos de font awesone --}}
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		{{-- Estilos propios de nosotros --}}
		<link rel="stylesheet" href="{{asset('css/main.css')}}">
		<link rel="stylesheet" href="{{asset('css/style.css')}}">
		{{-- Script de notificaciones toastr --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		{{-- Script de Jquery --}}
		<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>

		{{-- message toastr --}}
		{{-- <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
		<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
		<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script> --}}

		<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.17.0/js/uikit.min.js" integrity="sha512-xUVCfhBKjmVY7TmslnmOcqQl/A7pQ4Qd6bvPiSaXuG4vZRGLSrU51j3MymL4yH4h0fH17Vh7WqB/5R0sncrk8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.17.0/css/uikit.min.css" integrity="sha512-o/SwOc4ZXjB2wHymBdn0YrUG7tFFedWxliiYNmpziB2lkYqZUfh4/r+LdUSQAWq5kLYOin0jfYPLPs+J0bE4jA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.17.0/js/uikit-icons.min.js" integrity="sha512-QfebRrW6/OIJ+2b9rUILdsXcX0lO6UO6dCgJyGtd5VnCMyZ0jewXH3afwdEtRBB0z0rfCO+oO6i0V+/sat1wPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.min.css">

		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

		<link rel="stylesheet" href="{{ asset('vendor/leaflet/leaflet.css') }}">

		{{-- <link rel="stylesheet" href="{{ asset('fonts/Neusharp-Bold/neusharp-bold.css') }}"> --}}

		<link rel="stylesheet" href="{{ asset('css/front/header.css') }}">
		<link rel="stylesheet" href="{{ asset('css/front/footer.css') }}">

		

		@yield('jsLibExtras')
		@yield('cssExtras')
		@yield('styleExtras')
	</head>
	<body style="background-color: #201E1F;">

		@include('layouts.partials.header')

		@yield('content')

		@include('layouts.partials.footer')

		<script src="https://use.fontawesome.com/005ad652c9.js"></script>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/general.js')}}"></script>
		{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		{{-- <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
		<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
		<script src="{{ asset('vendor/leaflet/leaflet.js') }}"></script>

		<script>
			AOS.init();
		</script>
		<script>
			
			var modal = document.querySelector('.menu-modal');
			modal.style.display = "none";
	
			function activarModal() {
				modal.style.display = "block";
			}
	
			function cerrarModal() {
				modal.style.display = "none";
			}
	
		</script>

		{!! Toastr::message() !!}
		@yield('jsLibExtras2')

		{{-- {{$carrito}} --}}
		@yield('jqueryExtra')
	</body>
</html>
