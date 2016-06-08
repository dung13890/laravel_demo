<div class="form-group">
	{!! Form::label('title','Title:',['class'=>'control-label']) !!}
	{!! Form::text('title',null,['class'=>'form-control','required','placeholder'=>'Tiêu đề']) !!}

</div>

<div class="form-group">
	{!! Form::label('active','Active:',['class'=>'control-label']) !!}
	<label class="checkbox-inline">{!! Form::radio('active',1,true ) !!}  Yes  </label>
	<label class="checkbox-inline">{!! Form::radio('active',2) !!}  No  </label>
</div>
<hr>

<div class="form-group">
	{!! Form::submit($button_name,['class'=>'btn btn-primary']) !!}
	<a class="btn btn-default" href="{!! URL::previous() !!}">Back</a>
</div>