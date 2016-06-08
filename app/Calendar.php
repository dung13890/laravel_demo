<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model {

	protected $fillable = ['title','start_time','end_time','content','status','active','user_id'];

}
