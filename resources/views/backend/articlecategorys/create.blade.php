@extends('layouts.backend')

@section('head.title')
	Create Article Category
@stop

@section('body.content')
	<div class="container-fluid">
			{!!Breadcrumbs::render('backend.articlecategorys.create')!!}
			<h3 >Create Article Categorys </h3>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">Category</div>
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
						  		'action' => 'backend\ArticleCategorysController@store'
						  	])!!}

						  	@include('backend.articlecategorys._form',['button_name'=>'Create'])

						  	{!! Form::close() !!}

						</div>
					</div>
			  	</div>
			</div>
	</div>
@stop