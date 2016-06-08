<?php namespace App\Http\Controllers\backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Article;
use App\ArticleCategory;
use App\User;
use App\Role;

class DashboardController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$article = Article::count();
		$articleCategory = ArticleCategory::count();
		$user = User::count();
		$role = Role::count();

		return view('backend.dashboard.index',compact('article','articleCategory','user','role'));

	}

	

}
