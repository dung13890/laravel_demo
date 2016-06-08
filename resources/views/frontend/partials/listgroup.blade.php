<div class="col-md-3 hidden-xs">
	<span class="title">Categorys</span>
	<div class="list-group">
		<a href="#sub1" class="list-group-item" data-toggle="collapse">Categorys 1 <i class="fa fa-caret-down pull-right"></i></a>
			<div class="list-group-sub collapse" id="sub1">
				<a href="#" class="list-group-item"> Sub-category 1</a>
				<a href="#" class="list-group-item"> Sub-category 2</a>
			</div>
		<a href="#sub2" class="list-group-item" data-toggle="collapse">Categorys 2 <i class="fa fa-caret-down pull-right"></i></a>
		<div class="list-group-sub collapse" id="sub2">
				<a href="#" class="list-group-item"> Sub-category 2</a>
			</div>
		<a href="#" class="list-group-item">Categorys 3</a>
		<a href="#" class="list-group-item">Categorys 4</a>
	</div>

	<span class="title"> Best Product</span>
	@foreach($productBestList as $item)
	<div class="product-best-list">
	<div class="thumbnail text-center">
		<a href="{!! route('product.details',['slug'=>$item->slug,'id'=>$item->id])!!}"> <img class="products-image" src="{!!url('uploads/images/products/250x250/'. $item->image) !!}"> </a>
				@if($item->sale == '2')<div class="sale-image-best"> <span> -{!! 100 - floor ($item->price_sale * 100/$item->price)!!} %</span></div>@endif
		<div class="caption prod-caption">
			<h4><a href="{!! route('product.details',['slug'=>$item->slug,'id'=>$item->id])!!}"> {!!str_limit($item->title,20,'...')!!}</a> </h4>
			<p class="{!! ($item->sale == '2')? 'price-old' : 'price-product'!!}">{!! number_format($item->price)!!} đ</p>
			<div class="btn-group">
				<a href="" class="btn btn-default">{!!($item->sale == 1)? number_format($item->price) : number_format($item->price_sale)!!} đ</a>
				<a href="{!! route('product.details',['slug'=>$item->slug,'id'=>$item->id])!!}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Buy </a>
			</div>
		</div>
	</div>
	</div>
	@endforeach
</div>