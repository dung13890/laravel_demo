@extends('layouts.backend')

@section('head.title')
	Products Category List
@stop

@section('body.content')

	<div class="container-fluid">
			{!! Breadcrumbs::render('backend.productcategorys.index')!!}
			@include('backend.partials.messages')
			<div class="row">
				<div class="col-md-6 col-xs-6"><h3 class="margin-top-0">Table Category</h3></div>
				<div class="col-md-6 col-xs-6 text-right">
					<a class="btn btn-primary" href="{!!route('productcategorys.create'); !!}"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">Table</div>
						<div class="panel-body">

							{!! Datatable::table()
						    ->addColumn('Title','Updated_at','Active','Action')      
						    ->setUrl(route('productcategorys.data'))
						    ->setOptions(['aoColumns' => [null, ['bSortable' => true,'sClass'=>'hidden-xs'], ['bSortable' => false], ['bSortable' => false]]])
						    ->render() !!}

						</div>
					</div>
				</div>
			</div>
			
	</div>
@stop

