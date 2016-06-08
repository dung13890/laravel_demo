<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('name','Name:',['class'=>'control-label']) !!}
			{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Name']) !!}
		</div>
	</div>

	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('username','Username:',['class'=>'control-label']) !!}
			{!! Form::text('username',null,['class'=>'form-control',$isDisabled,'required','placeholder'=>'Username']) !!}
		</div>
	</div>

	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('email','Email:',['class'=>'control-label']) !!}
			{!! Form::email('email',null,['class'=>'form-control', $isDisabled,'required','placeholder'=>'Email']) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			{!! Form::label('password','Password:',['class'=>'control-label']) !!}
			{!! Form::password('password',['class'=>'form-control','placeholder'=>'Password']) !!}
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			{!! Form::label('password_confirmation','Confirm Password:',['class'=>'control-label']) !!}
			{!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Confirm Password']) !!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		<div class="form-group">
			{!! Form::label('role','Role:',['class'=>'control-label']) !!}
			{!! Form::select('role',$optionRole,Input::get('role'),['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-4 col-sm-offset-2">
		<div class="form-group">
			{!! Form::label('image','Upload Image:',['class'=>'control-label']) !!}
			{!! Form::file('image',['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-4">
		@if(isset($user) && $user->image)
		<img class='img-thumbnail'width='100px' src="{!! URL::to('uploads/images/users/thumbs/' . $user->image) !!}"></img>
		@endif
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