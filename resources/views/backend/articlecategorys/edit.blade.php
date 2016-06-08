@extends('layouts.backend')

@section('head.title')
	Edit Article Category
@stop

@section('body.content')
	<div class="container-fluid">
			{!!Breadcrumbs::render('backend.articlecategorys.edit')!!}
			<h3>Edit News Category</h3>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="panel  panel-default">
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
					
						  	{!! Form::model($articleCategory,[
						  		'action' => ['backend\ArticleCategorysController@update',$articleCategory->id],
						  		'method' => 'PUT'
						  	])!!}

						  	@include('backend.articlecategorys._form', ['button_name' => 'Update'])

						  	{!! Form::close() !!}
						</div>
					</div>
			  	</div>
			</div>
	</div>
@stop