<!-- Offcanvas- Slidebar -->
	<div class="wapper-slidebar">
		<div class="user-panel">
			<div class="pull-left"><img class="user-circle" src="{!!(Auth::user()->image)? URL::to('uploads/images/users/thumbs/' . Auth::user()->image) : URL::to('backend/images/empty.png'); !!}"></div>
			<div class="pull-left">
				<span class="user-info">{!! Auth::user()->name!!}</span><br>
				<span class="user-role"> @if(Auth::user()->role == '1') User @endif @if(Auth::user()->role == '2') Adminstrator @endif</span>
				<h6 class="user-last-login"><small>Last Login:<br> {!!date('d-M H:i',strtotime(Auth::user()->last_login))!!}</small></h6>
			</div>
		</div>

		<ul class="nav in" id="side-menu">
			<li><a class="{!! (Request::is('admin'))? 'active' : '' !!}" href="{!!route('dashboard')!!}"><span class="fa fa-tachometer"></span> Dashboard</a></li>
			<li><a href=""><span class="fa fa-bar-chart"></span> Charts</a></li>
			<li><a href="{!!URL::to('admin/calendar')!!}"><span class="fa fa-calendar"></span> Calendar</a></li>
			<li ><a href="#" class="{!! (Request::is('admin/article*'))? 'active' : '' !!}" ><span class="fa fa-list-alt"></span> Article Item <i class="glyphicon glyphicon-menu-left"></i></a>
				<ul class="nav nav-second-level">
					<li><a href="{!! Route('articlecategorys.index')!!}"><span class="fa fa-dot-circle-o"></span> Category</a></li>
					<li><a href="{!! Route('articles.index')!!}"><span class="fa fa-dot-circle-o"></span> Article</a></li>
				</ul>
			</li>
			<li><a href="#" class="{!! (Request::is('admin/products*') || Request::is('admin/slide*'))? 'active' : '' !!}" ><span class="fa fa-archive"></span> Products <i class="glyphicon glyphicon-menu-left"></i></a>
				<ul class="nav nav-second-level">
					<li><a href="{!! Route('productcategorys.index')!!}"><span class="fa fa-dot-circle-o"></span> Category</a></li>
					<li><a href="{!! Route('products.index')!!}"><span class="fa fa-dot-circle-o"></span> Products</a></li>
					<li><a href="{!! Route('slides.index')!!}"><span class="fa fa-dot-circle-o"></span> Slides</a></li>
					<li><a href="#"><span class="fa fa-dot-circle-o"></span> Action <i class="glyphicon glyphicon-menu-left"></i></a>
						<ul class="nav nav-third-level">
							<li><a href="">Order</a></li>
							<li><a href="">Color</a></li>
						</ul>
					</li>
				</ul>
			</li>
			@if(Auth::user()->role == 2)
			<li ><a href="#" class="{!! (Request::is('admin/users*') || Request::is('admin/roles*'))? 'active' : '' !!}" ><span class="fa fa-user"></span> Users <i class="glyphicon glyphicon-menu-left"></i></a>
				<ul class="nav nav-second-level">
					<li><a href="{!! Route('users.index')!!}"><span class="fa fa-dot-circle-o"></span> Users</a></li>
					<li><a href="{!! Route('roles.index')!!}"><span class="fa fa-dot-circle-o"></span> Roles</a></li>
				</ul>
			</li>
			@endif
		</ul>

	</div>

		<!-- End Offcanvas- Slidebar -->