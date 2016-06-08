<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>Forgot Your Password ?</title>
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/backend/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/backend/css/site.css">
</head>
<body >
	<div class="container" >
		<div class="signin-form">
				<div class="panel panel-default">
					<div class="panel-heading"><strong>Reset Password </strong></div>
					<div class="panel-body">
						@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
						@endif
						@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@else
						 <div class="center-block">
							<img class="profile-img" src="{!!URL::to('backend/images/empty.png')!!}" alt="">
						</div>
						@endif

						{!! Form::open() !!}

						<div class="row">
							<div class="col-sm-12 col-md-10 col-md-offset-1">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
										{!! Form::email('email',null,['class'=>'form-control','required','placeholder'=>'Email']) !!}
									</div>
								</div>

								<div class="form-group">
									{!! Form::submit('Send Password Reset',['class'=>'btn btn-lg btn-primary btn-block']) !!}
								</div>

							</div>
						</div>
						{!!Form::close()!!}
					</div>

				</div>
		</div>
	</div>
</body>
</html>


				