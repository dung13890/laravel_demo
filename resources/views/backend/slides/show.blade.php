@extends('layouts.backend')

@section('head.title')
	Info Slide 
@stop

@section('body.content')
	<div class="container-fluid">
			{!!Breadcrumbs::render('backend.slides.show')!!}
			<h3>Info Slide</h3>
			<hr>
			<div class="row">
				<div class="col-sm-8">
					<div class="panel  panel-default">
						<div class="panel-heading">Info</div>
						<div class="panel-body">
							<table class="table table-bordered table-striped">
								<tbody>
									<tr>
										<td><strong>Title</strong></td>
										<td>{!!str_limit($slide->title,50,'...')!!}</td>
									</tr>
									<tr>
										<td><strong>Link</strong></td>
										<td>{!!str_limit($slide->link,50,'...')!!}</td>
									</tr>
									<tr>
										<td><strong>Active</strong></td>
										<td>{!!$optionActive[$slide->active]!!}</td>
									</tr>
									<tr>
										<td><strong>Created_at</strong></td>
										<td>{!!date('d-m-Y H:i:s',strtotime($slide->created_at))!!}</td>
									</tr>
									<tr>
										<td><strong>Updated_at</strong></td>
										<td>{!!date('d-m-Y H:i:s',strtotime($slide->updated_at))!!}</td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" href="{!! route('slides.edit',$slide->id)!!}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
							<a onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" href="{!! route('slides.destroy',$slide->id)!!}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
							<a class="btn btn-default" href="{!! URL::previous() !!}"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
						</div>
					</div>
			  	</div>
			  	<div class="col-sm-4">
			  		<div class="panel panel-default">
			  			<div class="panel-heading">Content</div>
			  			<div class="panel-body">
			  				<img class='img-thumbnail slide-image' alt="{!!$slide->title!!}" src="{!!URL::to('/uploads/images/slides/thumbs/') . '/' . $slide->image!!}" > 
			  			</div>
			  		</div>
			  	</div>
			</div>
	</div>
@stop