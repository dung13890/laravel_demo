<div class="modal fade" id="filter-time-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">×</button>
			    <h5>Filter...</h5>
		    </div>
		    <div class="modal-body">
			    {!! Form::open([
			  				'class' => 'form-filter-time'
				  			])!!}
				  	<ul class="nav nav-tabs">
				  		<li class="active"><a href="#month-filter" data-toggle="tab">Month</a></li>
				  		<li><a href="#year-filter" data-toggle="tab">Year</a></li>
				  		<li><a href="#day-filter" data-toggle="tab">Day</a></li>
				  	</ul>
				  	<div class="tab-content margin-top-20">
				  		<div class="tab-pane fade in active" id="month-filter">
					  		<div class="row">
					  			<div class="col-sm-6">
					  				<div class="form-group">
										{!! Form::label('month_filter','Month :',['class'=>'control-label']) !!}
										<div class="input-group" id="month_filter-span">
											{!! Form::text('month_filter',null,['class'=>'form-control','required','placeholder'=>'MM-YYYY']) !!}
											<span class="input-group-addon">
							                    <i class="glyphicon glyphicon-calendar"></i>
							                </span>
										</div>
									</div>
					  			</div>
					  		</div>
				  		</div>

				  		<div class="tab-pane fade" id="year-filter">
					  		<div class="row">
					  			<div class="col-sm-6">
					  				<div class="form-group">
										{!! Form::label('year_filter','Year :',['class'=>'control-label']) !!}
										<div class="input-group" id="year_filter-span">
											{!! Form::text('year_filter',null,['class'=>'form-control','required','placeholder'=>'YYYY']) !!}
											<span class="input-group-addon">
							                    <i class="glyphicon glyphicon-calendar"></i>
							                </span>
										</div>
									</div>
					  			</div>
					  		</div>
				  		</div>

				  		<div class="tab-pane fade" id="day-filter">
					  		<div class="row">
					  			<div class="col-sm-4 col-xs-6">
					  				<div class="form-group">
										{!! Form::label('from_date','From Date:',['class'=>'control-label']) !!}
										{!! Form::text('from_date',null,['class'=>'form-control','required','placeholder'=>'DD-MM-YYYY']) !!}
									</div>
					  			</div>

					  			<div class="col-sm-4 col-xs-6">
					  				<div class="form-group">
										{!! Form::label('to_date','To Date:',['class'=>'control-label']) !!}
										{!! Form::text('to_date',null,['class'=>'form-control','required','placeholder'=>'DD-MM-YYYY']) !!}
									</div>
					  			</div>
					  		</div>
				  		</div>
			  		</div>
			  	{!! Form::close() !!}
		   	</div>
		   	<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                <button type="submit" id="submit-filter-time" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
            </div>
		</div>
	</div>
</div>

