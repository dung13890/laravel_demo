<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('title','Title:',['class'=>'control-label']) !!}
			{!! Form::text('title',null,['class'=>'form-control','required','placeholder'=>'Tiêu đề']) !!}

		</div>
	</div>

	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('Tags','Tags:',['class'=>'control-label']) !!}
			{!! Form::text('tags',null,['class'=>'form-control','required','placeholder'=>'Tags']) !!}

		</div>
	</div>

	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('introduction','Introduction:',['class'=>'control-label']) !!}
			{!! Form::text('introduction',null,['class'=>'form-control','required','placeholder'=>'Introduction']) !!}

		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			{!! Form::label('article_category_id','Category:',['class'=>'control-label']) !!}
			{!! Form::select('article_category_id',$optionArticleCategory,Input::get('article_category_id'),['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-4 col-sm-offset-1">
		<div class="form-group">
			{!! Form::label('image','Upload Image:',['class'=>'control-label']) !!}
			{!! Form::file('image',['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-4">
		@if(isset($article) && $article->image)
		<img class='img-thumbnail'width='100px' src="{!! URL::to('uploads/images/articles/thumbs/' . $article->image) !!}"></img>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			{!! Form::label('content','Content:',['class'=>'control-label']) !!}
			{!! Form::textarea('content',null,['class'=>'form-control textarea-summernote']) !!}
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