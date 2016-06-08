@extends('layouts.frontend')

@section('head.title')
	Home
@stop
@section('body.slide')
	@include('frontend.partials.slide')
@stop
@section('body.content')
<div class="col-md-9">
 <span class="title">Productions</span>
 <div class="fuild-container">
 	@foreach($products as $item)
 	<div class="col-md-4 col-sm-6 text-center">
 		<div class="thumbnail">
 				<a href="{!! route('product.details',['slug'=>$item->slug,'id'=>$item->id])!!}"> <img class="products-image" src="{!!url('uploads/images/products/250x250/'. $item->image) !!}"> </a>
				@if($item->sale == '2')<div class="sale-image"> <span> -{!! 100 - floor ($item->price_sale * 100/$item->price)!!} %</span></div>@endif
			<div class="caption prod-caption">
				<h4><a href="{!! route('product.details',['slug'=>$item->slug,'id'=>$item->id])!!}"> {!!str_limit($item->title,20,'...')!!}</a> </h4>
				<p class="{!! ($item->sale == '2')? 'price-old' : 'price-product'!!}">{!! number_format($item->price)!!} ₫</p>
				<div class="btn-group">
					<a href="" class="btn btn-default">{!!($item->sale == 1)? number_format($item->price) : number_format($item->price_sale)!!} ₫</a>
					<a href="{!! route('product.details',['slug'=>$item->slug,'id'=>$item->id])!!}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Buy </a>
				</div>
			</div>
 		</div>
 	</div>
 	@endforeach
 </div>
</div>
@stop