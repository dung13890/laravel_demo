@extends('layouts.backend')

@section('head.title')
	Info Article 
@stop

@section('body.content')
	<div class="container-fluid">
			{!!Breadcrumbs::render('backend.articles.show')!!}
			<h3>Info Article</h3>
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
										<td>{!!str_limit($article->title,50,'...')!!}</td>
									</tr>
									<tr>
										<td><strong>Introduction</strong></td>
										<td>{!!str_limit($article->introduction,50,'...')!!}</td>
									</tr>
									<tr>
										<td><strong>Tags</strong></td>
										<td>{!!str_limit($article->tags,50,'...')!!}</td>
									</tr>
									<tr>
										<td><strong>Category</strong></td>
										<td>{!!$optionArticleCategory[$article->article_category_id]!!}</td>
									</tr>
									<tr>
										<td><strong>User</strong></td>
										<td>{!!$optionUser[$article->user_id]!!}</td>
									</tr>
									<tr>
										<td><strong>Active</strong></td>
										<td>{!!$optionActive[$article->active]!!}</td>
									</tr>
									<tr>
										<td><strong>Created_at</strong></td>
										<td>{!!date('d-m-Y h:i:s',strtotime($article->created_at))!!}</td>
									</tr>
									<tr>
										<td><strong>Updated_at</strong></td>
										<td>{!!date('d-m-Y h:i:s',strtotime($article->updated_at))!!}</td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" href="{!! route('articles.edit',$article->id)!!}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
							<a onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" href="{!! route('articles.destroy',$article->id)!!}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
							<a class="btn btn-default" href="{!! URL::previous() !!}"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
						</div>
					</div>
			  	</div>
			  	<div class="col-sm-4">
			  		<div class="panel panel-default">
			  			<div class="panel-heading">Content</div>
			  			<div class="panel-body">
			  				<img class='img-thumbnail article-image' alt="{!!$article->title!!}" src="{!!URL::to('/uploads/images/articles/thumbs/') . '/' . $article->image!!}" > 
			  				<span>{!! str_limit(strip_tags($article->content),250,'...') !!}</span>
			  			</div>
			  		</div>
			  	</div>
			</div>
	</div>
@stop