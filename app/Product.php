<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $fillable = ['code','title','slug','tags','model','content','price','sale','price_sale','image','products_category_id','user_id','active'];

}
