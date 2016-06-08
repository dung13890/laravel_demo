@extends('layouts.backend')

@section('head.title')
	Info Roles
@stop

@section('body.content')
	<div class="container-fluid">
			{!!Breadcrumbs::render('roles.show')!!}
			<h3>Info Roles</h3>
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
										<td>{!!$role->title!!}</td>
									</tr>
									<tr>
										<td>Active</td>
										<td>{!!$optionActive[$role->active]!!}</td>
									</tr>
									<tr>
										<td>Created_at</td>
										<td>{!!date('d-m-Y h:i:s',strtotime($role->created_at))!!}</td>
									</tr>
									<tr>
										<td>Updated_at</td>
										<td>{!!date('d-m-Y h:i:s',strtotime($role->updated_at))!!}</td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" href="{!! route('roles.edit',$role->id)!!}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
							<a onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" href="{!! route('roles.destroy',$role->id)!!}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
						</div>
					</div>
			  	</div>
			</div>
	</div>
@stop