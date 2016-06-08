@extends('layouts.backend')

@section('head.title')
	Info Article Category
@stop

@section('body.content')
	<div class="container-fluid">
			{!!Breadcrumbs::render('backend.articlecategorys.show')!!}
			<h3>Info Category</h3>
			<hr>
			<div class="row">
				<div class="col-md-8">
					<div class="panel  panel-default">
						<div class="panel-heading">Info</div>
						<div class="panel-body">
							<table class="table table-bordered table-striped">
								<tbody>
									<tr>
										<td>Title</td>
										<td>{!!$articleCategory->title!!}</td>
									</tr>
									<tr>
										<td>Active</td>
										<td>{!!$optionActive[$articleCategory->active]!!}</td>
									</tr>
									<tr>
										<td>Created_at</td>
										<td>{!!date('d-m-Y h:i:s',strtotime($articleCategory->created_at))!!}</td>
									</tr>
									<tr>
										<td>Updated_at</td>
										<td>{!!date('d-m-Y h:i:s',strtotime($articleCategory->updated_at))!!}</td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" href="{!! route('articlecategorys.edit',$articleCategory->id)!!}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
							<a onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" href="{!! route('articlecategorys.destroy',$articleCategory->id)!!}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
							<a class="btn btn-default" href="{!! URL::previous() !!}"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
						</div>
					</div>
			  	</div>
			</div>
	</div>
@stop