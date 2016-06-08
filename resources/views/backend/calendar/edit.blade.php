<div class="modal fade" id="edit-calendar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title">Time:</h5>
			</div>
			<div class="modal-body">
				
				{!! Form::model($calendar,[
	  				'class' => 'form-edit-calendar'
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
		  		<div class="row">
		  			<div class="col-sm-6">
		  				<div class="form-group">
							{!! Form::label('status','Status:',['class'=>'control-label']) !!}
							<label class="checkbox-inline">{!! Form::radio('status',1 ) !!}  Ok  </label>
							<label class="checkbox-inline">{!! Form::radio('status',2 ) !!}  Delay  </label>
						</div>
		  			</div>
		  		</div>
		  		{!! Form::close() !!}
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                <button type="submit" id="submit-edit-calendar" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Update</button>
                <button type="submit" id="submit-delete-calendar" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
            </div>
		</div>
	</div>
</div>