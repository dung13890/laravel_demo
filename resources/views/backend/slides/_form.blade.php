<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('title','Title:',['class'=>'control-label']) !!}
			{!! Form::text('title',null,['class'=>'form-control','required','placeholder'=>'Tiêu đề']) !!}

		</div>
	</div>

	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('link','Link:',['class'=>'control-label']) !!}
			{!! Form::text('link',null,['class'=>'form-control','placeholder'=>'Link']) !!}

		</div>
	</div>

</div>
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('image','Upload Image:',['class'=>'control-label']) !!}
			{!! Form::file('image',['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-4">
		@if(isset($slide) && $slide->image)
		<img class='img-thumbnail'width='100px' src="{!! URL::to('uploads/images/slides/thumbs/' . $slide->image) !!}"></img>
		@endif
	</div>
</div>


<div class="form-group">
	{!! Form::label('active','Active:',['class'=>'control-label']) !!}
	<label class="checkbox-inline">{!! Form::radio('active',1,true) !!}  Yes  </label>
	<label class="checkbox-inline">{!! Form::radio('active',2) !!}  No  </label>
</div>
<hr>

<div class="form-group">
	{!! Form::submit($button_name,['class'=>'btn btn-primary']) !!}
	<a class="btn btn-default" href="{!! URL::previous() !!}">Back</a>
</div>