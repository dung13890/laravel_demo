<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{!! csrf_token() !!}" />
	<title>@yield('head.title')</title>
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/backend/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/backend/css/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/backend/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/backend/css/summernote.css">
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/backend/css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/backend/css/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/backend/css/site.css">
	@yield('head.css')
</head>
<body>


	<div class="wapper">

		@include('backend.partials.navbar')
		@include('backend.partials.slidebar')
		<div class="wapper-content">
			@yield('body.content')
		</div>
		@include('backend.partials.footer')
		

	</div>

	
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/jquery.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/metisMenu.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/summernote.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/moment.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/jquery.maskMoney.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/fullcalendar.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/lang-all.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/highcharts.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/global.js"></script>
	@yield('charts.js')
	@yield('body.js')
</body>
</html>