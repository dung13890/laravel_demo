@extends('layouts.backend')

@section('head.title')
	Info User
@stop

@section('body.content')
	<div class="container-fluid">
			{!!Breadcrumbs::render('users.show')!!}
			<h3>Info User</h3>
			<hr>
			<div class="row">
				<div class="col-sm-8">
					<div class="panel  panel-default">
						<div class="panel-heading">Info</div>
						<div class="panel-body">
							<table class="table table-bordered table-striped">
								<tbody>
									<tr>
										<td><strong>Name</strong></td>
										<td>{!!$user->name!!}</td>
									</tr>
									<tr>
										<td><strong>User Name</strong></td>
										<td>{!!$user->username!!}</td>
									</tr>
									<tr>
										<td><strong>Email</strong></td>
										<td>{!!$user->email!!}</td>
									</tr>
									<tr>
										<td><strong>Role</strong></td>
										<td>{!!$optionRole[$user->role]!!}</td>
									</tr>
									<tr>
										<td><strong>Active</strong></td>
										<td>{!!$optionActive[$user->active]!!}</td>
									</tr>
									<tr>
										<td><strong>Last Login</strong></td>
										<td>{!!date('d-m-Y H:i:s',strtotime($user->last_login))!!}</td>
									</tr>
									<tr>
										<td><strong>Created_at</strong></td>
										<td>{!!date('d-m-Y H:i:s',strtotime($user->created_at))!!}</td>
									</tr>
									<tr>
										<td><strong>Updated_at</strong></td>
										<td>{!!date('d-m-Y H:i:s',strtotime($user->updated_at))!!}</td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" href="{!! route('users.edit',$user->id)!!}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
							<a onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" href="{!! route('users.destroy',$user->id)!!}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
							<a class="btn btn-default" href="{!! URL::previous() !!}"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
						</div>
					</div>
			  	</div>
			  	<div class="col-sm-4">
			  		<div class="panel  panel-default">
			  			<div class="panel-heading">Image</div>
			  			<div class="panel-body">
			  				<div class="center-block">
								<img class="img-thumbnail" src="{!!($user->image)? URL::to('uploads/images/users/' . $user->image) : URL::to('backend/images/empty.png'); !!}" alt="{!! $user->name!!}">
							</div>
			  			</div>
			  		</div>
			  	</div>

			</div>
	</div>
@stop