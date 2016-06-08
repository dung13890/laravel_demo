<?php namespace App\Http\Controllers\backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\backend\ArticlesFormRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\ArticleCategory;
use App\Article;
use App\Config;
use App\User;
use Image;
use File;
use Datatable;

class ArticlesController extends Controller {


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
		return view('backend.articles.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$optionArticleCategory = ArticleCategory::where('active','1')->lists('title','id');
		return view('backend.articles.create',compact('optionArticleCategory'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ArticlesFormRequest $request)
	{
		$article = new Article();
		$article->title = $request->title;
		$article->slug = str_slug($request->title,'-');
		$article->tags = $request->tags;
		$article->introduction = $request->introduction;
		$article->content = $request->content;
		$article->article_category_id = $request->article_category_id;
		$article->user_id = $this->auth->user()->id;
		$article->active = $request->active;


		if($request->hasFile('image'))
		{
			$destinationPath = public_path('uploads/images/articles/');
			$image = $request->file('image');
			$imageName = date('Y_m_d_H_i_s') . '_' .$image->getClientOriginalName();
			Image::make($image->getRealPath())->resize(100,100)->save($destinationPath . 'thumbs/' . $imageName);
			$image->move($destinationPath, $imageName);
			$article->image = $imageName;
		}

		$article->save();

		return redirect()->route('articles.index')->with('message','Success..! Bạn đã thêm mới thành công..!');

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
		$optionArticleCategory = ArticleCategory::lists('title','id');
		$optionUser = User::lists('name','id');	
		$article = Article::findOrFail($id);

		return view('backend.articles.show',compact('article','optionActive','optionUser','optionArticleCategory'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$optionArticleCategory = ArticleCategory::where('active','1')->lists('title','id');
		$article = Article::findOrFail($id);

		return view('backend.articles.edit',compact('article','optionArticleCategory'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ArticlesFormRequest $request)
	{
		$article = Article::findOrFail($id);
		$article->title = $request->title;
		$article->slug = str_slug($request->title,'-');
		$article->tags = $request->tags;
		$article->introduction = $request->introduction;
		$article->content = $request->content;
		$article->article_category_id = $request->article_category_id;
		$article->user_id = $this->auth->user()->id;
		$article->active = $request->active;

		if($request->hasFile('image'))
		{
			$destinationPath = public_path('uploads/images/articles/');
			$oldImage = $destinationPath . $article->image;
			$oldThumbs = $destinationPath . 'thumbs/' . $article->image;

			if(File::isFile($oldImage))
			{
				File::delete($oldImage,$oldThumbs);
			}

			$image = $request->file('image');
			$imageName = date('Y_m_d_H_i_s') . '_' .$image->getClientOriginalName();
			Image::make($image->getRealPath())->resize(100,100)->save($destinationPath . 'thumbs/' . $imageName);
			$image->move($destinationPath, $imageName);
			$article->image = $imageName;
		}

		$article->save();

		return redirect()->route('articles.index')->with('message','Success..! Bạn đã cập nhật thành công..!');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = Article::findOrFail($id);
		$destinationPath = public_path('uploads/images/articles/');
		$oldImage = $destinationPath . $article->image;
		$oldThumbs = $destinationPath . 'thumbs/' . $article->image;

		if(File::isFile($oldImage))
		{
			File::delete($oldImage,$oldThumbs);
		}
		$article->delete();
		return redirect()->route('articles.index')->with('message','Success..! Bạn đã xóa thành công..!');


	}

	public function data()
	{

		$article = Article::all();
		return Datatable::collection($article)
		->searchColumns('title','slug','tags','content','introduction','active','article_category_id')
		->orderColumns('title','article_category_id','introduction','active')
		->addColumn('title', function($model){
			return str_limit($model->title,50,'...');
		})
		->addColumn('introduction', function($model){
			return str_limit($model->introduction,50,'...');
		})
		->addColumn('image', function($model){
			return "<img class='img-thumbnail' alt='". $model->title . "' src='" .url() . '/uploads/images/articles/thumbs/' . $model->image . "' >";
		})
		->addColumn('article_category_id', function($model){
			$optionArticleCategory = ArticleCategory::lists('title','id');
			return $optionArticleCategory[$model->article_category_id];
		})
		->addColumn('active', function($model){
			$optionActive = Config::where('group','active')->lists('title','value');
			return $optionActive[$model->active];
		})
		->addColumn('Action', function($model){
			return "<a href=" . route('articles.show',$model->id) . "><i class='glyphicon glyphicon-eye-open'></i></a> " . 
					"<a href=" . route('articles.edit',$model->id) . "><i class='fa fa-edit'></i></a> " .
					"<a onclick=\"return confirm('Are you sure you want to delete this item?');\" href=" . route('articles.destroy',$model->id) . "><i class='glyphicon glyphicon-trash'></i></a>";
		})
		->make();
	}

}
