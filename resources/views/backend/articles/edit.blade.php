@extends('layouts.backend')

@section('head.title')
	Edit Article
@stop

@section('body.content')
	<div class="container-fluid">
			{!!Breadcrumbs::render('backend.articles.edit')!!}
			<h3>Edit Articles </h3>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="panel  panel-default">
						<div class="panel-heading">Articles</div>
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
					
						  	{!! Form::model($article,[
						  		'action' => ['backend\ArticlesController@update',$article->id],
						  		'method' => 'PUT',
						  		'files' => 'true'
						  	])!!}

						  	@include('backend.articles._form', ['button_name' => 'Update'])

						  	{!! Form::close() !!}
						</div>
					</div>
			  	</div>
			</div>
	</div>
@stop