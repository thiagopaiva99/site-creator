<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
	<title>Material Pro Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
	<link href="{{ url('/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ url('/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
	<link href="{{ url('/plugins/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
	<link href="{{ url('/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
	<link href="{{ url('/plugins/c3-master/c3.min.css') }}" rel="stylesheet">
	<link href="{{ url('css/style.css') }}" rel="stylesheet">
	<link href="{{ url('css/colors/blue.css') }}" id="theme" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body class="">

@include("layouts._partials.preloader")

<div id="main-wrapper">
	@if( Auth::check() )
		@include("layouts._partials.navbar")
		@include("layouts._partials.sidebar")
	@endif

	<div class="page-wrapper">
		<div class="container-fluid">
			<br>

			{{--@if( Auth::check() )--}}
				{{--@include("layouts._partials.breadcrumb")--}}
			{{--@endif--}}

			<div class="row">
				@yield("content")
			</div>
		</div>
		<footer class="footer"> © 2017 @thiagopaiva99</footer>
	</div>
</div>

<script src="{{ url('/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('/plugins/bootstrap/js/tether.min.js') }}"></script>
<script src="{{ url('/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/jquery.slimscroll.js') }}"></script>
<script src="{{ url('js/waves.js') }}"></script>
<script src="{{ url('js/sidebarmenu.js') }}"></script>
<script src="{{ url('/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<script src="{{ url('js/custom.js') }}"></script>
<script src="{{ url('/plugins/chartist-js/dist/chartist.min.js') }}"></script>
<script src="{{ url('/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ url('/plugins/d3/d3.min.js') }}"></script>
<script src="{{ url('/plugins/c3-master/c3.min.js') }}"></script>
<script src="{{ url('js/dashboard1.js') }}"></script>
</body>

</html>
