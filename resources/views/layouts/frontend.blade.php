<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{!! csrf_token() !!}" />
	<title>@yield('head.title')</title>
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/frontend/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/frontend/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/frontend/css/jquery.bootstrap-touchspin.min.css">
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/frontend/css/shop-page.css">
	@yield('head.css')
</head>
<body>
	<div class="wapper">
		@include('frontend.partials.menu')
		<div class="container">
				@yield('body.slide')
			<div class="row">
				@include('frontend.partials.listgroup')
				@yield('body.content')
			</div>
		</div>
		@include('frontend.partials.footer')
	</div>
<script type="text/javascript" src="{{URL::to('/')}}/frontend/js/jquery.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/frontend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/frontend/js/jquery.elevateZoom-3.0.8.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/frontend/js/jquery.bootstrap-touchspin.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/frontend/js/shop-page.js"></script>
	@yield('body.js')
</body>
</html>