<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model {

	protected $fillable = ['title','time','quantity','price','active'];

}
