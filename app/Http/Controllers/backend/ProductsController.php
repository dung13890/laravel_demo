<?php namespace App\Http\Controllers\backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\ProductsFormRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;
use App\ProductImage;
use App\Config;
use App\User;
use Image;
use File;
use Datatable;

class ProductsController extends Controller {


	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('backend.products.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$optionProductCategory = ProductCategory::where('active','1')->lists('title','id');
		return view('backend.products.create',compact('optionProductCategory'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ProductsFormRequest $request)
	{


		$product = new Product();
		$product->code = $request->code;
		$product->title = $request->title;
		$product->slug = str_slug($request->title,'-');
		$product->tags = $request->tags;
		$product->model = $request->model;
		$product->price = str_replace(',','',$request->price);
		$product->sale = $request->sale;
		$product->price_sale = str_replace(',','', $request->price_sale);
		$product->content = $request->content;
		$product->product_category_id = $request->product_category_id;
		$product->user_id = $this->auth->user()->id;
		$product->active = $request->active;


		if($request->hasFile('image'))
		{
			$destinationPath = public_path('uploads/images/products/');
			$image = $request->file('image');
			$imageName = date('Y_m_d_H_i_s') . '_' .$image->getClientOriginalName();
					// Save Image 100x100
			Image::make($image->getRealPath())->resize(100,100)->save($destinationPath . 'thumbs/' . $imageName);

					//Save Image 250 x 250
			Image::make($image->getRealPath())->resize(250,250)
			->text('laravel Dung Shop', 130, 130 , function($font){
				$font->size(45);
			    $font->color('#fdf6e3');
			    $font->align('center');
			})
			->save($destinationPath . '250x250/' . $imageName);

				// Save Image width 600
			Image::make($image->getRealPath())
			->resize(600,null,function ($constraint) {
			    $constraint->aspectRatio();
			})
			->text('laravel Dung Shop', 250, 200 , function($font){
				$font->size(45);
			    $font->color('#fdf6e3');
			    $font->align('center');
			})
			->save($destinationPath . $imageName);
			//$image->move($destinationPath, $imageName);
			$product->image = $imageName;
		}

		$product->save();

				// Upload multiple image 

		if($request->hasFile('multipleimages'))
		{

			$destinationPathMulti = public_path('uploads/images/productimages/');
			foreach ($request->file('multipleimages') as $item) {
				$imagesName = date('Y_m_d_H_i_s') . '_' .$item->getClientOriginalName();
				Image::make($item->getRealPath())->resize(100,100)->save($destinationPathMulti . 'thumbs/' . $imagesName);
				Image::make($item->getRealPath())
				->resize(600,null,function ($constraint) {
			    	$constraint->aspectRatio();
				})
				->text('laravel Dung Shop', 250, 200 , function($font){
					$font->size(45);
				    $font->color('#fdf6e3');
				    $font->align('center');
				})
				->save($destinationPathMulti . $imagesName);
				$productImage = new ProductImage();
				$productImage->product_id = $product->id;
				$productImage->image = $imagesName;
				$productImage->save();
			}

		}

		return redirect()->route('products.index')->with('message','Success..! Bạn đã thêm mới thành công..!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$optionActive = Config::where('group','active')->lists('title','id');
		$optionProductCategory = ProductCategory::lists('title','id');
		$optionUser = User::lists('name','id');	
		$product = Product::findOrFail($id);

		$productImage = ProductImage::where('product_id',$id)->get();

		return view('backend.products.show',compact('product','optionActive','optionUser','optionProductCategory','productImage'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$optionProductCategory = ProductCategory::where('active','1')->lists('title','id');
		$product = Product::findOrFail($id);
		$productImage = ProductImage::where('product_id',$id)->get();

		return view('backend.products.edit',compact('product','optionProductCategory','productImage'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ProductsFormRequest $request)
	{
		$product = Product::findOrFail($id);
		$product->code = $request->code;
		$product->title = $request->title;
		$product->slug = str_slug($request->title,'-');
		$product->tags = $request->tags;
		$product->model = $request->model;
		$product->price = str_replace(',','',$request->price);
		$product->sale = $request->sale;
		$product->price_sale = str_replace(',','', $request->price_sale);
		$product->content = $request->content;
		$product->product_category_id = $request->product_category_id;
		$product->user_id = $this->auth->user()->id;
		$product->active = $request->active;

		if($request->hasFile('image'))
		{
			$destinationPath = public_path('uploads/images/products/');
			$oldImage = $destinationPath . $product->image;
			$oldThumbs = $destinationPath . 'thumbs/' . $product->image;
			$old250x250 = $destinationPath . '250x250/' . $product->image;

			if(File::isFile($oldImage))
			{
				File::delete($oldImage,$oldThumbs,$old250x250);
			}

			$image = $request->file('image');
			$imageName = date('Y_m_d_H_i_s') . '_' .$image->getClientOriginalName();
			 // Save Image 100 x 100
			Image::make($image->getRealPath())->resize(100,100)->save($destinationPath . 'thumbs/' . $imageName);
			 // Save Image 250 x 250
			Image::make($image->getRealPath())->resize(250,250)
			->text('laravel Dung Shop', 130, 130 , function($font){
				$font->size(45);
			    $font->color('#fdf6e3');
			    $font->align('center');
			})
			->save($destinationPath . '250x250/' . $imageName);

			 // Save Image width 600
			Image::make($image->getRealPath())
			->resize(600,null,function ($constraint) {
			    $constraint->aspectRatio();
			})
			->text('laravel Dung Shop', 250, 200 , function($font){
				$font->size(45);
			    $font->color('#fdf6e3');
			    $font->align('center');
			})
			->save($destinationPath . $imageName);
			//$image->move($destinationPath, $imageName);
			$product->image = $imageName;
		}

		$product->save();

		// Upload multiple image 

		if($request->hasFile('multipleimages'))
		{

			$destinationPathMulti = public_path('uploads/images/productimages/');
			foreach ($request->file('multipleimages') as $item) {
				$imagesName = date('Y_m_d_H_i_s') . '_' .$item->getClientOriginalName();
				Image::make($item->getRealPath())->resize(100,100)->save($destinationPathMulti . 'thumbs/' . $imagesName);
				Image::make($item->getRealPath())
				->resize(600,null,function ($constraint) {
			    	$constraint->aspectRatio();
				})
				->text('laravel Dung Shop', 250, 200 , function($font){
					$font->size(45);
				    $font->color('#fdf6e3');
				    $font->align('center');
				})
				->save($destinationPathMulti . $imagesName);
				$productImage = new ProductImage();
				$productImage->product_id = $id;
				$productImage->image = $imagesName;
				$productImage->save();
			}

		}

		return redirect()->route('products.index')->with('message','Success..! Bạn đã cập nhật thành công..!');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::findOrFail($id);
		$destinationPath = public_path('uploads/images/products/');
		$oldImage = $destinationPath . $product->image;
		$oldThumbs = $destinationPath . 'thumbs/' . $product->image;
		$old250x250 = $destinationPath . '250x250/' . $product->image;

		if(File::isFile($oldImage))
		{
			File::delete($oldImage,$oldThumbs,$old250x250);
		}
		$product->delete();

		$destinationPathMulti = public_path('uploads/images/productimages/');
		$productImage = ProductImage::where('product_id',$id)->get();
		foreach ($productImage as $item) {
			$oldImageMulti = $destinationPathMulti . $item->image;
			$oldThumbsMulti = $destinationPathMulti . 'thumbs/' . $item->image;
			if(File::isFile($oldImageMulti))
			{
				File::delete($oldImageMulti,$oldThumbsMulti);
			}
			$item->delete();
		}

		return redirect()->route('products.index')->with('message','Success..! Bạn đã xóa thành công..!');
	}

	public function data()
	{

		$product = Product::all();
		return Datatable::collection($product)
		->searchColumns('code','title','slug','tags','content','price','active','product_category_id')
		->orderColumns('code','title','product_category_id','price','active','updated_at')
		->showColumns('code')
		->addColumn('title', function($model){
			return str_limit($model->title,50,'...');
		})
		->addColumn('price', function($model){
			return ($model->sale == 1) ?
			 number_format($model->price) : "<p class='price-old'>" . number_format($model->price) . "</p>" . number_format($model->price_sale);
		})
		->addColumn('image', function($model){
			return "<img class='img-thumbnail img-product' alt='". $model->title . "' src='" .url() . '/uploads/images/products/thumbs/' . $model->image . "' >";
		})
		->addColumn('product_category_id', function($model){
			$optionProductCategory = ProductCategory::lists('title','id');
			return $optionProductCategory[$model->product_category_id];
		})
		->addColumn('active', function($model){
			$optionActive = Config::where('group','active')->lists('title','value');
			return $optionActive[$model->active];
		})
		->addColumn('updated_at', function($model){
			return date('d-m H:i',strtotime($model->updated_at));
		})
		->addColumn('Action', function($model){
			return "<a href=" . route('products.show',$model->id) . "><i class='glyphicon glyphicon-eye-open'></i></a> " . 
					"<a href=" . route('products.edit',$model->id) . "><i class='fa fa-edit'></i></a> " .
					"<a onclick=\"return confirm('Are you sure you want to delete this item?');\" href=" . route('products.destroy',$model->id) . "><i class='glyphicon glyphicon-trash'></i></a>";
		})
		->make();
	}


}
