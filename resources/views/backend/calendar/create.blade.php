<div class="modal fade" id="create-calendar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Time:</h5>
			</div>
			<div class="modal-body">
				
				{!! Form::open([
	  				'class' => 'form-create-calendar'
		  			])!!}
		  			{!!Form::hidden('start_time',null,['id'=>'start_time'])!!}
		  			{!!Form::hidden('end_time',null,['id'=>'end_time'])!!}
		  		<div class="row">
		  			<div class="col-sm-6">
		  				<div class="form-group">
							{!! Form::label('title','Title',['class'=>'control-label']) !!}
							{!! Form::text('title',null,['class'=>'form-control','required','placeholder'=>'Title']) !!}
						</div>
		  			</div>
		  		</div>
		  		<div class="row">
		  			<div class="col-sm-6">
		  				<div class="form-group">
							{!! Form::label('content','Content',['class'=>'control-label']) !!}
							{!! Form::textarea('content',null,['class'=>'form-control','rows'=>'3','placeholder'=>'Content']) !!}
						</div>
		  			</div>
		  		</div>
		  		
		  		{!! Form::close() !!}
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                <button type="submit" id="submit-create-calendar" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Create</button>
            </div>
		</div>
	</div>
</div>