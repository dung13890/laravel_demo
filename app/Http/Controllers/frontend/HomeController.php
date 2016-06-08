<?php namespace App\Http\Controllers\frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\CommentFormRequest;
use Illuminate\Http\Request;
use App\Product;
use App\Comment;
use Redirect;
use App\ProductCategory;
use App\ProductImage;
use App\Slide;
use Cart;

class HomeController extends Controller {

	protected $productCategory;
	protected $productBestList;

	public function __construct()
	{
		$this->productCategory = ProductCategory::where('active','1')->orderBy('title')->get();
		$this->productBestList = product::where('active','1')->orderBy('view','DESC')->skip('1')->take('3')->get();
		//$productBest = product::where('active','1')->orderBy('view','DESC')->first();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$slide = Slide::where('active','1')->orderBy('id','DESC')->take('3')->get();
		$productCategory = $this->productCategory;
		$productBest = product::where('active','1')->orderBy('view','DESC')->first();
		$productBestList = $this->productBestList;
		$products = Product::where('active','1')->orderBy('id','DESC')->get();
		//$cart = Cart::content();
		return view('frontend.home.index',compact('products','slide','productCategory','productBest','productBestList'));
	}
	public function productDetails($slug,$id) 
	{
		$product = Product::findOrFail($id);
		$productCategory = $this->productCategory;
		$productBestList = $this->productBestList;
		$optionProductCategory = ProductCategory::lists('title','id');
		$productImage = ProductImage::where('product_id',$id)->take('4')->get();
		$comment = Comment::where('active','1')->where('product_id',$id)->orderBy('id','DESC')->take('4')->get();
		return view('frontend.products.details',compact('product','productCategory','productBestList','productImage','optionProductCategory','comment'));
	}

	public function cartList()
	{
		$productCategory = $this->productCategory;
		$productBestList = $this->productBestList;
		$cart = Cart::content();
		return view('frontend.products.cart',compact('productCategory','productBestList','cart'));
	}

	public function cartStore($id, Request $request)
	{
		$product = Product::findOrFail($id);
			Cart::add([
				'id' => $product->id,
				'name' => $product->title,
				'qty' => $request->quantity,
				'price' => ($product->sale == '1') ? $product->price : $product->price_sale,
				'options' => ['size'=>$request->size,'image'=>$product->image],
				]);

		return Redirect::back()->with('message','Success..! Bạn đã thêm vào giỏ hàng thành công..!');;

	}

	public function cartUpdate(Request $request)
	{
		dd($request);
	}

	public function productComment($id, CommentFormRequest $request)
	{
		//dd($request);
		$comment = New Comment();
		$comment->product_id = $id;
		$comment->name = $request->name;
		$comment->email = $request->email;
		$comment->star = $request->star;
		$comment->content = $request->content;
		$comment->save();

		return Redirect::back();
	}

	

}
