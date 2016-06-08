@extends('layouts.backend')

@section('head.title')
	Create Article
@stop

@section('body.content')
	<div class="container-fluid">
			{!!Breadcrumbs::render('backend.products.create')!!}
			<h3 >Create Article </h3>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">Article</div>
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
						  		'action' => 'backend\ProductsController@store',
						  		'files' => 'true'
						  	])!!}

						  	@include('backend.products._form',['button_name'=>'Create'])

						  	{!! Form::close() !!}

						</div>
					</div>
			  	</div>
			</div>
	</div>
@stop