<?php namespace App\Http\Controllers\backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests\backend\CalendarFormRequest;
use App\Calendar;

class CalendarController extends Controller {

	
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
	public function getIndex()
	{
		$user_id = $this->auth->user()->id;
		$calendar = Calendar::where('active','1')
							  	->where('user_id',$user_id)
								->get(['id',
										'title',
										\DB::raw("IF(TIMESTAMPDIFF(second,start_time,end_time)>=86400,DATE_FORMAT(start_time,'%Y-%m-%d'),start_time) as start"),
										\DB::raw("IF(TIMESTAMPDIFF(second,start_time,end_time)>=86400, DATE_FORMAT(end_time,'%Y-%m-%d'), DATE_FORMAT(end_time,'%Y-%m-%dT%H:%i:%s')) as end"),
										\DB::raw("IF(status=2,'#d9534f',null) as color"),
										]);
								//return $calendar;
		
		return view('backend.calendar.index',compact('calendar'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return view('backend.calendar.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore(CalendarFormRequest $requset)
	{
		//return $requset->all();
		//return '234';
		$calendar = new Calendar();
		$calendar->title = $requset->title;
		$calendar->start_time = date('Y-m-d H:i:s',strtotime($requset->start_time));
		$calendar->end_time = date('Y-m-d H:i:s',strtotime($requset->end_time));
		$calendar->content = $requset->content;
		$calendar->user_id = $this->auth->user()->id;
		$calendar->save();
		return $calendar->id;
	}

	
	public function getEdit($id)
	{
		$calendar = Calendar::findOrFail($id);
		return view('backend.calendar.edit',compact('calendar'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate($id, CalendarFormRequest $request)
	{
		$calendar = Calendar::findOrFail($id);
		$calendar->title = $request->title;
		$calendar->content = $request->content;
		$calendar->status = $request->status;
		if($calendar->start_time != date('Y-m-d H:i:s',strtotime($request->start_time)))
		{
			$calendar->start_time = date('Y-m-d H:i:s',strtotime($request->start_time));
		}
		if($calendar->end_time != date('Y-m-d H:i:s',strtotime($request->end_time)))
		{
			$calendar->end_time = date('Y-m-d H:i:s',strtotime($request->end_time));
		}
		$calendar->user_id = $this->auth->user()->id;
		$calendar->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDestroy()
	{
		$calendar_id = \Input::get('id');
		$calendar = Calendar::findOrFail($calendar_id);
		$calendar->delete();
		////return $calendar;
	}

}
