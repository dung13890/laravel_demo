@extends('layouts.backend')

@section('head.title')
	Edit User
@stop

@section('body.content')
	<div class="container-fluid">
			{!!Breadcrumbs::render('users.edit')!!}
			<h3>Edit user</h3>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="panel  panel-default">
						<div class="panel-heading">User</div>
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
						  		'action' => ['Auth\UsersController@update',$user->id],
						  		'method' => 'PUT',
						  		'files'=>'true'
						  	])!!}

						  	@include('auth.users._form', ['button_name' => 'Update','isDisabled'=>'disabled'])

						  	{!! Form::close() !!}
						</div>
					</div>
			  	</div>
			</div>
	</div>
@stop