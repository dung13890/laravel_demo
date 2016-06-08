@extends('layouts.frontend')

@section('head.title')
	Shoppting Cart
@stop
@section('body.content')
<div class="col-md-9">
	<span class="title">Cart</span>
	<div class="container-fluid">
		<div class="row hero-feature">
			@if(count($cart))
			<table class="table table-bordered">
				<thead>
					<tr>
						<td class="hidden-xs">Image</td>
						<td >Name</td>
						<td>Size</td>
						<td class="hidden-xs">Quantity</td>
						<td class="hidden-xs">Unit Price</td>
						<td>Sub Total</td>
						<td>Remove</td>
					</tr>
				</thead>
				<tbody>
					@foreach ($cart as $item)
					<tr>
						<td  class="hidden-xs text-center"><img width="47" class="img-thumbnail" src="{!! url('uploads/images/products/thumbs/' .$item->options['image'])!!}"> </td>
						<td><a href="">{!!$item->name!!}</a> </td>
						<td>{!! Form::select('size',['37'=>'37','38'=>'38','39'=>'39','40'=>'40'],$item->options->size,['class'=>'form-control select-size']) !!}</td>
						<td class="hidden-xs">{!! Form::text('quantity',$item->qty,['class'=>'form-control text-center']) !!}</td>
						<td class="hidden-xs">{!!number_format($item->price)!!}₫</td>
						<td>{!!number_format($item->subtotal)!!}₫</td>
						<td class="text-center">
							<a class="btn btn-default" href=""><i class="fa fa-refresh"></i></a>
							<a class="btn btn-default" href=""><i class="fa fa-trash-o"></i></a> 
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="well cart-total-bill">
				<h3> Total : {!!number_format(Cart::total())!!}₫</h3>
				<hr>
				<a class="btn btn-primary" href="#"><i class="fa fa-arrow-circle-left"></i> Continue Shop</a>
				<a class="btn btn-primary" href="#"><i class="fa fa-arrow-circle-right"></i> Check out</a>
			</div>
			@else
			<h3>Nothing item in your cart</h3>
			@endif
		</div>
	</div>
</div>
@stop