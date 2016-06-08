@extends('layouts.backend')

@section('head.title')
	Edit Profile
@stop

@section('body.content')
	<div class="container-fluid">
			{!!Breadcrumbs::render('profile.edit')!!}
			<h3>Edit Profile</h3>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="panel  panel-default">
						<div class="panel-heading">Profile</div>
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
							@endif
					
						  	{!! Form::model($user,[
						  		'action' => 'Auth\ProfileController@update',
						  		'method' => 'PUT',
						  		'files'=>'true'
						  	])!!}

						  	<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('name','Name:',['class'=>'control-label']) !!}
										{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Name']) !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('username','Username:',['class'=>'control-label']) !!}
										{!! Form::text('username',null,['class'=>'form-control','disabled','required','placeholder'=>'Username']) !!}
									</div>
								</div>

								<div class="col-sm-4">
									<div class="form-group">
										{!! Form::label('email','Email:',['class'=>'control-label']) !!}
										{!! Form::email('email',null,['class'=>'form-control', 'disabled','required','placeholder'=>'Email']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
										{!! Form::label('role','Role:',['class'=>'control-label']) !!}
										{!! Form::select('role',$optionRole,Input::get('role'),['class'=>'form-control','disabled']) !!}
									</div>
								</div>
								<div class="col-sm-4 col-sm-offset-2">
									<div class="form-group">
										{!! Form::label('image','Upload Image:',['class'=>'control-label']) !!}
										{!! Form::file('image',['class'=>'form-control']) !!}
									</div>
								</div>
								<div class="col-sm-4">
									@if($user->image)
									<img class='img-thumbnail'width='100px' src="{!! URL::to('uploads/images/users/thumbs/' . $user->image) !!}"></img>
									@endif
								</div>
							</div>

							<hr>

							<div class="form-group">
								{!! Form::submit('Update',['class'=>'btn btn-primary']) !!}
								<a class="btn btn-default" href="{!! URL::previous() !!}">Back</a>
							</div>


						  	{!! Form::close() !!}
						</div>
					</div>
			  	</div>
			</div>
	</div>
@stop