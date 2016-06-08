<header>
	<div class="container">
		<div class="row">

			<!-- Logo -->
			<div class="col-md-4 hidden-sm hidden-xs">
				<div class="well logo">
					<a href="#"><img width="45" src="{!! url('frontend/image/logo.png') !!}"></a>
					<span>Online Shop</span>
				</div>
			</div>
			<!-- End Logo -->

			<!-- Search -->
			<div class="col-md-5 col-sm-9 col-xs-9">
				<div class="well">
					{!! Form::open([
						  		'url' => ''
						  	])!!}
					<div class="input-group">
						{!! Form::text('search',null,['class'=>'form-control','placeholder'=>'Enter something to search...']) !!}
						<span class="input-group-btn">
							<button class="btn btn-default no-border-left" type="submit"><i class="fa fa-search"></i></button>
						</span>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
			<!-- End Search -->

			<!-- Cart Shop -->
			<div class="col-md-3 col-sm-3 col-xs-3">
				<div class="well">
					<div class="btn-group shoppting-cart">
						<button type="button" class="btn btn-default  dropdown-toggle pull-right" data-toggle="dropdown"> 
							<i class="fa fa-shopping-cart"> </i>
							<span class="hidden-sm hidden-xs"> Shopping Cart: </span> {!!Cart::count()!!} <span class="hidden-xs">item(s)</span>
						</button>
						<ul class="dropdown-menu cart-content">
							@foreach(Cart::content() as $item)
							<li><a href="{!!route('product.cart')!!}">
								<p class="cart-content-name">{!!str_limit($item->name,20,'...')!!} </p>
								<span class="cart-content-price"> x{!! $item->qty . ' $' . number_format($item->price)!!} ₫</span>
								</a>
							</li>
							@endforeach
							<li class="divider"></li>
							<li><a href="{!!route('product.cart')!!}"> Total: {!!number_format(Cart::total())!!} ₫ </a></li>
					</ul>
					</div>
				</div>
			</div>
			<!-- End Cart Shop -->
		</div>
	</div>
</header>

<nav class="navbar navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
			</button>
			<!-- text logo mobile view -->
			<a class="visible-xs navbar-brand" href="#">Shop Online</a>
		</div>
		<div id="navbar-collapse" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a class="{!! (Request::is('/'))? 'active' : '' !!}" href="{!!url()!!}">Home</a></li>
				<li ><a class="{!! (Request::is('gio-hang.html'))? 'active' : '' !!}" href="{!!route('product.cart')!!}">Shopping Cart</a></li>
				<li><a href="">Articles</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown">Category <i class="caret"></i></a>
					<ul class="dropdown-menu">
						@foreach($productCategory as $item)
						<li><a href="">{!! $item->title!!}</a></li>
						@endforeach
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown">Menu <i class="caret"></i></a>
					<ul class="dropdown-menu">
						<li><a href="">About Us</a> </li>
						<li><a href="">Help</a> </li>
						<li><a href="">Compare</a> </li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>