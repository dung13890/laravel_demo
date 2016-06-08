@extends('layouts.backend')

@section('head.title')
	Dashboard
@stop

@section('body.content')

	<div class="container-fluid">

		{!! Breadcrumbs::render('dashboard')!!}
			<div class="row">
				<div class="col-md-6 col-xs-6"><h3 class="margin-top-0">Dashboard</h3></div>
			</div>
			<hr>

			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3"><i class="fa fa-file-text-o fa-4x"></i></div>
								<div class="col-xs-9 text-right">
									<div class="huge">{!!$article!!}</div>
									<div>Total Article!</div>
								</div>
							</div>
						</div>
						<a href="{!!route('articles.index')!!}">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="panel panel-green">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3"><i class="fa fa-tasks fa-4x"></i></div>
								<div class="col-xs-9 text-right">
									<div class="huge">{!!$articleCategory!!}</div>
									<div>Total Categ..!</div>
								</div>
							</div>
						</div>
						<a href="{!!route('articlecategorys.index')!!}">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="panel panel-yellow">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3"><i class="fa fa-users fa-4x"></i></div>
								<div class="col-xs-9 text-right">
									<div class="huge">{!!$role!!}</div>
									<div>Total Role!</div>
								</div>
							</div>
						</div>
						<a href="{!!route('roles.index')!!}">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3"><i class="fa fa-user fa-4x"></i></div>
								<div class="col-xs-9 text-right">
									<div class="huge">{!!$user!!}</div>
									<div>Total User!</div>
								</div>
							</div>
						</div>
						<a href="{!!route('users.index')!!}">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-bar-chart-o fa-fw"></i> Area Chart
							<div class="pull-right">
								<div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" >
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a class="charts-type" value="area" href="#">Area-Chart</a></li>
                                        <li><a class="charts-type" value="line" href="#">Line-Chart</a></li>
                                        <li><a class="charts-type" value="column" href="#">Column-Chart</a></li>
                                        <li class="divider"></li>
                                        <li><a data-toggle="modal" href="#filter-time-modal" data-whatever="filter-time-area">Time Filter</a></li>
                                    </ul>
                                </div>
							</div>
						</div>
						<div class="panel-body">
							<div id="area-chart"></div>
						</div>
					</div>
					@include('backend.partials.filtertimemodal')
				</div>
				<div class="col-sm-4">
					<!-- Data Table -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-th-list"></i> Data
							<div class="pull-right">
								<div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#filter-time-modal" data-whatever="filter-time-data">
                                        Time
                                        <i class="glyphicon glyphicon-time"></i>
                                    </button>
                                </div>
							</div>
						</div>
						<div class="panel-body">
							<table class="table table-bordered table-striped">
								<tbody>
									<tr>
										<td><strong>Time</strong> </td>
										<td>In Month 8 - 2015</td>
									</tr>
									<tr>
										<td><strong>Quantity</strong> </td>
										<td>2.234.721</td>
									</tr>
									<tr>
										<td><strong>Price</strong> </td>
										<td>925.357.000 $</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- Data Table -->
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-pie-chart"></i> Pie Chart
							<div class="pull-right">
								<div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#filter-time-modal" data-whatever="filter-time-pie">
                                        Time
                                        <i class="glyphicon glyphicon-time"></i>
                                    </button>
                                </div>
							</div>
						</div>
						<div class="panel-body">
							<div id="pie-chart"></div>
						</div>
					</div>
				</div>
			</div>
	</div>
@stop

@section('body.js')
 @include('backend.partials.scriptcharts',['id'=>'area-charts'])
@stop



