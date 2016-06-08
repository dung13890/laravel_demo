<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('title','Title:',['class'=>'control-label']) !!}
			{!! Form::text('title',null,['class'=>'form-control','required','placeholder'=>'Tiêu đề']) !!}

		</div>
	</div>
</div>

<div class="form-group">
	{!! Form::label('active','Active:',['class'=>'control-label']) !!}
	<label class="checkbox-inline">{!! Form::radio('active',1,(Input::old('active') == '1' || (isset($data) && $data->active == '1') || !isset($data))? true : false ) !!}  Yes  </label>
	<label class="checkbox-inline">{!! Form::radio('active',2,(Input::old('active') == '2' || (isset($data) && $data->active == '2') )? true : false ) !!}  No  </label>
</div>
<hr>

<div class="form-group">
	{!! Form::submit($button_name,['class'=>'btn btn-primary']) !!}
	<a class="btn btn-default" href="{!! URL::previous() !!}">Back</a>
</div>