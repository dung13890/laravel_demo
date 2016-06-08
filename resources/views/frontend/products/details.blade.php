@extends('layouts.frontend')

@section('head.title')
	{!!$product->code . ' | '. $product->title!!}
@stop
@section('body.content')
<div class="col-md-9">
	<span class="title">Productions / Details</span>
	<div class="container-fluid">
		<div class="row">
			@if(Session::has('message'))
			<div class="col-md-12">
				<div class="alert alert-success">{!!Session::get('message')!!}</div>
			</div>
			@endif
			<div class="col-md-6 col-sm-6">
				<div class="product-detail-image">
						<img class="img-responsive"  id="zoom-image" src="{!!url('uploads/images/products/' . $product->image)!!}" data-zoom-image="{!!url('uploads/images/products/' . $product->image)!!}">
				</div>
				<div class="container-fluid">
					<div class="row">
						@foreach($productImage as $item)
						<div class="col-xs-3 product-thumbs-image">
							<a href="#" data-image="{!!url('uploads/images/productimages/' . $item->image)!!}" class="thumbnail">
								<img src="{!!url('uploads/images/productimages/thumbs/' . $item->image)!!}">
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="well">
					{!! Form::open([
						  		'action' => ['frontend\HomeController@cartStore',$product->id]
						  	])!!}
					<div class="row"><div class="col-xs-12"><h4>{!!$product->title!!}</h4></div></div>
					<div class="row">
						<div class="col-xs-12">
							@if($product->sale == 2)<span class="price-old-details">{!!number_format($product->price)!!} ₫ </span> <span class="sale-percent"><i class="fa fa-thumbs-up"></i> -{!! 100 - floor ($product->price_sale * 100/$product->price)!!}%</span>@endif
							<p class="price-product-details">{!!($product->sale == 2) ? number_format($product->price_sale) : number_format($product->price)!!} ₫</p> 
						</div>
					</div>
					<div class="row">
						<div class="col-xs-5"><h5> CODE : </h5></div>
						<div class="col-xs-7"> <h5>{!!$product->code!!} </h5></div>
					</div>

					<div class="row">
						<div class="col-xs-5"><h5> Category : </h5></div>
						<div class="col-xs-7"> <h5><a href="#">{!!$optionProductCategory[$product->product_category_id]!!} </a></h5></div>
					</div>
					<div class="row">
						<div class="col-xs-5"> <h5>Model :</h5></div>
						<div class="col-xs-7"> <h5>{!!$product->model!!}</h5></div>
					</div>
					<div class="row">
						<div class="col-xs-5"> <h5>Size :</h5></div>
						<div class="col-xs-7">
							<div class="form-group">
								{!! Form::select('size',['37'=>'37','38'=>'38','39'=>'39','40'=>'40'],null,['class'=>'form-control select-size']) !!}
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
									{!! Form::text('quantity',1,['class'=>'form-control text-center']) !!}
							</div>
						</div>
						<div class="col-sm-6">
							<button class="btn btn-default"><i class="fa fa-shopping-cart"></i> Add to Card</button>
						</div>
					</div>
					{!! Form::close() !!}

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 product-detail-tab">
				<ul class="nav nav-tabs">
				  <li  class="active"><a href="#description" data-toggle="tab">Mô tả</a></li>
				  <li ><a href="#comment" data-toggle="tab">Comment</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="description">
						<div class="well">
							{!!$product->content!!}
						</div>
					</div>
					<div class="tab-pane" id="comment">
						<div class="well">
							@foreach($comment as $item)
							<div class="media">
								<div class="pull-left">
									<img class="profile-image" src="{!!url('frontend/image/photo.jpg')!!}">
									<div class="product-rating">
										@for ($i = 1; $i < 6; $i++)
										<i class="fa @if($item->star == $i)fa-star-half-o @elseif($item->star < $i)fa-star-o @else fa-star @endif"></i> 
										@endfor
									</div>
								</div>
								
								<div class="media-body">
									<h5 class="media-heading"><strong>{!!$item->name!!}</strong></h5>
									{!!$item->content!!}
								</div>
							</div>
							@endforeach
							<hr>
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
						  		'url' => route('product.comment',$product->id)
						  	])!!}
						  	<div class="row">
							  	<div class="col-sm-6">
							  		<div class="form-group">
							  			{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Name']) !!}
							  		</div>

							  		<div class="form-group">
							  			{!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Email']) !!}
							  		</div>

							  		<div class="form-group">
							  			{!! Form::select('star',['5'=>'5 star','4'=>'4 star','3'=>'3 star','2'=>'2 star','1'=>'1 star'],null,['class'=>'form-control']) !!}
							  		</div>
							  	</div>
							  	<div class="col-sm-6">
							  		<div class="form-group">
							  		 {!! Form::textarea('content',null,['class'=>'form-control','rows'=>'3','placeholder'=>'Comment']) !!}
							  		</div>
							  		<button class="btn btn-default"> Submit Comment</button>
							  	</div>
						  	</div>
						  	{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop