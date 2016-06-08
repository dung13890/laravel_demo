<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class config extends Model {

	protected $table ="config";
	protected $fillable = ['title','value','group'];

}
