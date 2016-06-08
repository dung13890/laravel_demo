<div class="row">
	<div class="col-sm-2">
		<div class="form-group">
			{!! Form::label('code','CODE:',['class'=>'control-label']) !!}
			{!! Form::text('code',null,['class'=>'form-control','required','placeholder'=>'CODE']) !!}

		</div>
	</div>

	<div class="col-sm-2">
		<div class="form-group">
			{!! Form::label('product_category_id','Category:',['class'=>'control-label']) !!}
			{!! Form::select('product_category_id',$optionProductCategory,Input::get('product_category_id'),['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('title','Title:',['class'=>'control-label']) !!}
			{!! Form::text('title',null,['class'=>'form-control','required','placeholder'=>'Title']) !!}

		</div>
	</div>

	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('Tags','Tags:',['class'=>'control-label']) !!}
			{!! Form::text('tags',null,['class'=>'form-control','required','placeholder'=>'Tags']) !!}

		</div>
	</div>

</div>

<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('price','Price:',['class'=>'control-label']) !!}
			<div class="input-group">
				<span class="input-group-addon">{!! Form::radio('sale',1,true) !!}</span>
			{!! Form::text('price',null,['class'=>'form-control currency','required','placeholder'=>'0,000']) !!}
			<span class="input-group-addon">$</span>
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('price_sale','Price Sale:',['class'=>'control-label']) !!}
			<div class="input-group">
			<span class="input-group-addon">{!! Form::radio('sale',2) !!}</span>
			{!! Form::text('price_sale',null,['class'=>'form-control currency','placeholder'=>'0,000']) !!}
			<span class="input-group-addon">$</span>
			</div>
		</div>
	</div>

</div>
<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			{!! Form::label('model','Model:',['class'=>'control-label']) !!}
			{!! Form::text('model',null,['class'=>'form-control','placeholder'=>'Model']) !!}
		</div>
	</div>
	<div class="col-sm-4 col-sm-offset-1">
		<div class="form-group">
			{!! Form::label('image','Upload Image:',['class'=>'control-label']) !!}
			{!! Form::file('image',['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-sm-4">
		@if(isset($product) && $product->image)
		<img class='img-thumbnail'width='100px' src="{!! URL::to('uploads/images/products/thumbs/' . $product->image) !!}"></img>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-sm-3">
		<div class="form-group">
			{!! Form::label('multipleimages','Upload Multiple Image:',['class'=>'control-label']) !!}
			{!! Form::file('multipleimages[]',['class'=>'form-control','multiple'=>'true']) !!}
		</div>
	</div>
	<div class="col-sm-9">
		@if(isset($productImage))
		<div class="container-fluid">
	  		<div class="row">
	  			@foreach($productImage as $item)
	  			<div class="col-xs-4 col-sm-2 item-image">
		  			<img class='img-thumbnail product-image' alt="{!!$product->title!!}" src="{!!URL::to('/uploads/images/productimages/thumbs/') . '/' . $item->image!!}" >
		  			<div class="image-del"><a onclick="return confirm('Are you sure you want to delete this item?');" href="{!! url('admin/ajax/destroy-product-image/' . $item->id)!!}"><i class="fa fa-times-circle"></i></a> </div>
	  			</div>
	  			@endforeach
	  		</div>
  		</div>
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
	<label class="checkbox-inline">{!! Form::radio('active',1,true ) !!}  Yes  </label>
	<label class="checkbox-inline">{!! Form::radio('active',2 ) !!}  No  </label>
</div>
<hr>

<div class="form-group">
	{!! Form::submit($button_name,['class'=>'btn btn-primary']) !!}
	<a class="btn btn-default" href="{!! URL::previous() !!}">Back</a>
</div>