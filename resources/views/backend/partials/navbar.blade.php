<!-- Header - Navbar -->

		<nav class="navbar navbar-inverse navbar-fixed-top nav-opacity">
			<div class="container-fluid">
				<div class="navbar-header">

					<button type="buttom" class="navbar-toggle btn-menu-canvas" data-toggle="offcanvas">
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="#">My Application</a>

					<button type="button" class="navbar-toggle custom-navbar-btn"  data-toggle="collapse" data-target="#navbar">
					<span class="glyphicon glyphicon-cog"></span>
					</button>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Profile<i class="caret"></i></a>
							<ul class="dropdown-menu">
								<li><a href="{!! Route('profile.index')!!}"><span class="glyphicon glyphicon-user"></span> {!! Auth::user()->name!!}</a></li>
								<li><a href="{!! Route('profile.edit')!!}"><span class="fa fa-cogs"></span> Setting</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="{!! URL::to('auth/logout')!!}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
							</ul>
						</li>
					</ul>

				</div>
			</div>

		</nav>

		<!-- End Header - Navbar -->