<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>Reset Password ?</title>
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/backend/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/backend/css/site.css">
</head>
<body >
	<div class="container" >
		<div class="signin-form">
				<div class="panel panel-default">
					<div class="panel-heading"><strong>Reset Password </strong></div>
					<div class="panel-body">
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
						{!! Form::hidden('token', $token) !!}
						<div class="row">
							<div class="col-sm-12 col-md-10 col-md-offset-1">
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
										{!! Form::email('email',null,['class'=>'form-control','required','placeholder'=>'Email']) !!}
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										{!! Form::password('password',['class'=>'form-control','required','placeholder'=>'Password']) !!}
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										{!! Form::password('password_confirmation',['class'=>'form-control','required','placeholder'=>'Confirm Password']) !!}
									</div>
								</div>

								<div class="form-group">
									{!! Form::submit('Reset Password',['class'=>'btn btn-lg btn-primary btn-block']) !!}
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
