<div class="row">
	<!-- slide -->
	<div class="col-md-9 col-sm-12">
		<div class="bs-slider">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<?php $dem = 0;?>
					@foreach($slide as $item)
					<div class="item {!!($dem ==0)?'active':''; $dem ++; !!}">
						<img class="slide-image" src="{!!url('uploads/images/slides/' . $item->image) !!}" alt="">
					</div>
					@endforeach

				</div>

				<!-- Controls -->
				  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
			</div>
		</div>
	</div>
	<!-- End slide -->

	<!-- Production Best -->
	<div class="col-md-3 hidden-sm hidden-xs">
		<div class="row text-center">
			<div class="thumbnail product-best">
				<a href="{!! route('product.details',['slug'=>$productBest->slug,'id'=>$productBest->id])!!}"> <img class="products-image-best" src="{!!url('uploads/images/products/250x250/' . $productBest->image) !!}"> </a>
				@if($productBest->sale == '2')<div class="sale-image-best"><span> -{!! 100 - floor ($productBest->price_sale * 100/$productBest->price)!!} %</span></div>@endif
				<div class="caption prod-caption">
					<h4><a href="{!! route('product.details',['slug'=>$productBest->slug,'id'=>$productBest->id])!!}"> {!!str_limit($productBest->title,20,'...')!!}</a> </h4>
					<p class="{!! ($productBest->sale == '2')? 'price-old' : 'price-product'!!}">{!! number_format($productBest->price)!!} đ</p>
					<div class="btn-group">
						<a href="" class="btn btn-default">{!!($productBest->sale == 1)? number_format($productBest->price) : number_format($productBest->price_sale)!!} đ</a>
						<a href="{!! route('product.details',['slug'=>$productBest->slug,'id'=>$productBest->id])!!}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Buy </a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Production Best -->
</div>