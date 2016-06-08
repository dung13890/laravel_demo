@extends('layouts.backend')

@section('head.title')
	Slides List
@stop

@section('body.content')

	<div class="container-fluid">
		{!! Breadcrumbs::render('backend.slides.index')!!}
			@include('backend.partials.messages')
			<div class="row">
				<div class="col-md-6 col-xs-6"><h3 class="margin-top-0">Table Slides</h3></div>
				<div class="col-md-6 col-xs-6 text-right">
					<a class="btn btn-primary" href="{!!route('slides.create'); !!}"><i class="glyphicon glyphicon-plus-sign"></i> Create</a>
				</div>
			</div>
			<hr>

			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">Table</div>
						<div class="panel-body">

							{!! Datatable::table()
						    ->addColumn('Title','Image','Active','Action')      
						    ->setUrl(route('slides.data'))
						    ->setOptions(['aoColumns' => [null, 
						    	['bSortable' => false], 
						    	['bSortable' => true,'sClass'=>'hidden-xs'], 
						    	['bSortable' => false]

						    	]])
						    ->render() !!}

						</div>
					</div>
				</div>
			</div>
			
	</div>
@stop

