<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $fillable = ['title','slug','tags','introduction','content','image','article_category_id','user_id','active'];

}
