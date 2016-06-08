@extends('layouts.frontend')

@section('head.title')
	Index
@stop

@section('body.content')
	<div class="col-md-9">
		<div class="row">
			<div class="span3">
				<div class="well">

					<div class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon-shopping-cart"></i>
							3 item - $999.99
							<b class="caret"></b></a>
						
						<div class="dropdown-menu well" role="menu" aria-labelledby="dLabel">
							<p>Item x 1 <span class="pull-right">$333.33</span></p>
							<p>Item x 1 <span class="pull-right">$333.33</span></p>
							<p>Item x 1 <span class="pull-right">$333.33</span></p>
							<a href="#" class="btn btn-primary">Checkout</a>
						</div>
					</div>

				</div>

				<div class="well">
					<ul class="nav nav-list">
						<li class="nav-header">Sidebar</li>
						<li class="active">
							<a href="#">Link</a>
						</li>
						<li>
							<a href="#">Link</a>
						</li>
						<li>
							<a href="#">Link</a>
						</li>

						<li class="nav-header">Sidebar</li>
						<li>
							<a href="#">Link</a>
						</li>
						<li>
							<a href="#">Link</a>
						</li>
						<li>
							<a href="#">Link</a>
						</li>

						<li class="nav-header">Sidebar</li>
						<li>
							<a href="#">Link</a>
						</li>
						<li>
							<a href="#">Link</a>
						</li>
						<li>
							<a href="#">Link</a>
						</li>
					</ul>
				</div>

			</div>

			<div class="span9">

				<ul class="thumbnails">
					@foreach($product as $item)
					<li class="span3">
						<div class="thumbnail">
							<img src="{!!url() .  '/uploads/images/products/thumbs/' . $item->image;!!}">
							<div class="caption">
								<h4>{!! $item->title !!}</h4>
								<p>$ {!!number_format($item->price)!!}</p>
								<a class="btn btn-primary" href="#">View</a>
								<a class="btn btn-success" href="#">Add to Cart</a>
							</div>
						</div>
					</li>
					@endforeach
					 
				</ul>
				<div class="pagination">
					<ul>
						<li class"disabled"=""><span>Prev</span></li>
						<li class"disabled"=""><span>1</span></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">Next</a></li>
					</ul>
				</div>

			</div>
		</div>
	</div>
@stop