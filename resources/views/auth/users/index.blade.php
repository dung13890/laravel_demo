@extends('layouts.backend')

@section('head.title')
	Danh sách Users 
@stop

@section('body.content')

	<div class="container-fluid">
		{!! Breadcrumbs::render('users.index')!!}
			@include('backend.partials.messages')
			<div class="row">
				<div class="col-md-6 col-xs-6"><h3 class="margin-top-0">Table Users</h3></div>
				<div class="col-md-6 col-xs-6 text-right">
					<a class="btn btn-primary" href="{!!route('users.create'); !!}"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading">Search</div>
						<div class="panel-body">
							{!! Form::open(['action' => 'Auth\UsersController@index','method'=>'GET','class'=>'form-inline']) !!}
							<div class="form-group">
								{!! Form::text('keyword',Input::get('keyword'),['class'=>'form-control','placeholder'=>'Search..!']) !!}
							</div>

							<div class="form-group">
								Roles:
								{!! Form::select('role',$optionRole,Input::get('role'),['class'=>'form-control']) !!}
							</div>
							<div class="form-group">
								Active:
								{!! Form::select('active',$optionActive,Input::get('active'),['class'=>'form-control']) !!}
							</div>
							<div class="form-group">
								{!! Form::submit('Search',['class'=>'btn btn-primary']) !!}
								<a class="btn btn-default" href="{!!Route('roles.index')!!}"><i class="glyphicon glyphicon-refresh"></i> Reset</a>
							</div>

							{!! Form::close() !!}
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">Table</div>
						<div class="panel-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Name</th>
										<th>Role</th>
										<th class="hidden-xs">Image</th>
										<th class="hidden-xs">Active</th>
										<th class="hidden-xs">Last Login</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

									@foreach($users as $item)
									<tr>
										<td>{!! $item->name!!}</td>
										<td>{!! $optionRole[$item->role] !!}</td>
										<td class="hidden-xs"><img width="50px" class="img-thumbnail" src="{!!($item->image)? URL::to('uploads/images/users/thumbs/' . $item->image) : URL::to('backend/images/empty.png'); !!}"></td>
										<td class="hidden-xs">{!! $optionActive[$item->active] !!}</td>
										<td class="hidden-xs">{!! date('d-m-Y H:i:s',strtotime($item->last_login)) !!}</td>
										<td>
										<a href="{!! route('users.show',$item->id)!!}"><i class="glyphicon glyphicon-eye-open"></i></a>
										<a href="{!! route('users.edit',$item->id)!!}"><i class="glyphicon glyphicon-pencil"></i></a>
										<a onclick="return confirm('Are you sure you want to delete this item?');" href="{!! route('users.destroy',$item->id)!!}"><i class="glyphicon glyphicon-trash"></i></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>

							<div class="row">
								<div class="col-sm-6"><p class="info-row-data">Showing {!! $users->count() !!} to {!! $users->perPage() !!} of {!! $users->total() !!} entries</p></div>
								<div class="col-sm-6 text-right">{!!$users->render()!!}</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			
	</div>
@stop
