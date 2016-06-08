@extends('layouts.backend')

@section('head.title')
	Create Roles
@stop

@section('body.content')
	<div class="container-fluid">
			{!!Breadcrumbs::render('roles.create')!!}
			<h3 >Create Roles </h3>
			<hr>
			<div class="row">
				<div class="col-md-8">
					<div class="panel panel-default">
						<div class="panel-heading">Roles</div>
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
						
						  	{!! Form::open([
						  		'action' => 'Auth\RolesController@store'
						  	])!!}

						  	@include('auth.roles._form',['button_name'=>'Create'])

						  	{!! Form::close() !!}

						</div>
					</div>
			  	</div>
			</div>
	</div>
@stop