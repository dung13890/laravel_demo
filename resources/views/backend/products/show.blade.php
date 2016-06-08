@extends('layouts.backend')

@section('head.title')
	Info Article 
@stop

@section('body.content')
	<div class="container-fluid">
			{!!Breadcrumbs::render('backend.products.show')!!}
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
										<td><strong>CODE</strong></td>
										<td>{!!$product->code!!}</td>
									</tr>
									<tr>
										<td><strong>Title</strong></td>
										<td>{!!str_limit($product->title,50,'...')!!}</td>
									</tr>
									<tr>
										<td><strong>Price</strong></td>
										<td>{!! number_format($product->price)!!}</td>
									</tr>
									<tr>
										<td><strong>Tags</strong></td>
										<td>{!!str_limit($product->tags,50,'...')!!}</td>
									</tr>
									<tr>
										<td><strong>Category</strong></td>
										<td>{!!$optionProductCategory[$product->product_category_id]!!}</td>
									</tr>
									<tr>
										<td><strong>User</strong></td>
										<td>{!!$optionUser[$product->user_id]!!}</td>
									</tr>
									<tr>
										<td><strong>Active</strong></td>
										<td>{!!$optionActive[$product->active]!!}</td>
									</tr>
									<tr>
										<td><strong>Created_at</strong></td>
										<td>{!!date('d-m-Y H:i:s',strtotime($product->created_at))!!}</td>
									</tr>
									<tr>
										<td><strong>Updated_at</strong></td>
										<td>{!!date('d-m-Y H:i:s',strtotime($product->updated_at))!!}</td>
									</tr>
								</tbody>
							</table>
							<a class="btn btn-primary" href="{!! route('products.edit',$product->id)!!}"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
							<a onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger" href="{!! route('products.destroy',$product->id)!!}"><i class="glyphicon glyphicon-trash"></i> Delete</a>
							<a class="btn btn-default" href="{!! URL::previous() !!}"><i class="glyphicon glyphicon-arrow-left"></i> Back</a>
						</div>
					</div>
			  	</div>
			  	<div class="col-sm-4">
			  		<div class="panel panel-default">
			  			<div class="panel-heading">Content</div>
			  			<div class="panel-body">
			  				<img class='img-thumbnail product-image' alt="{!!$product->title!!}" src="{!!URL::to('/uploads/images/products/thumbs/') . '/' . $product->image!!}" > 
			  				<span>{!! str_limit(strip_tags($product->content),250,'...') !!}</span>
			  			</div>
			  		</div>
			  		<div class="container-fluid">
				  		<div class="row">
				  			@foreach($productImage as $item)
				  			<div class="col-xs-4 item-image">
					  			<img class='img-thumbnail product-image' alt="{!!$product->title!!}" src="{!!URL::to('/uploads/images/productimages/thumbs/') . '/' . $item->image!!}" >
					  			<div class="image-del"><a onclick="return confirm('Are you sure you want to delete this item?');" href="{!! url('admin/ajax/destroy-product-image/' . $item->id)!!}"><i class="fa fa-times-circle"></i></a> </div>
				  			</div>
				  			@endforeach
				  		</div>
			  		</div>
			  	</div>
			</div>
	</div>
@stop