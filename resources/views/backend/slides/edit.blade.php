@extends('layouts.backend')

@section('head.title')
	Edit Slide
@stop

@section('body.content')
	<div class="container-fluid">
			{!!Breadcrumbs::render('backend.slides.edit')!!}
			<h3>Edit Slide </h3>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="panel  panel-default">
						<div class="panel-heading">Slide</div>
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
					
						  	{!! Form::model($slide,[
						  		'action' => ['backend\SlidesController@update',$slide->id],
						  		'method' => 'PUT',
						  		'files' => 'true'
						  	])!!}

						  	@include('backend.slides._form', ['button_name' => 'Update'])

						  	{!! Form::close() !!}
						</div>
					</div>
			  	</div>
			</div>
	</div>
@stop