<?php namespace App\Http\Controllers\backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Image;
use File;
use Redirect;
use Illuminate\Http\Request;
use App\Chart;
use App\ProductImage;

class AjaxGlobalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function postImage()
	{
		if(Input::hasFile('image'))
		{
			$image = Input::file('image');
			$destinationPath = public_path('uploads/images/summernote/');
			$imageName = date('Y_m_d_H_i_s') . '_' .$image->getClientOriginalName();
			Image::make($image->getRealPath())->resize(600,null,function($constraint){$constraint->aspectRatio();})
			->text('laravel Dung Shop', 250, 200 , function($font){
				$font->size(45);
			    $font->color('#fdf6e3');
			    $font->align('center');
			})
			->save($destinationPath . $imageName);
				
			return url() . '/uploads/images/summernote/' . $imageName;
		}

	}

	public function getDestroyProductImage($id)
	{
		$productImage = ProductImage::findOrFail($id);
		$destinationPath = public_path('uploads/images/productimages/');
		$oldImage = $destinationPath . $productImage->image;
		$oldThumbs = $destinationPath . 'thumbs/' . $productImage->image;
		if(File::isFile($oldImage))
		{
			File::delete($oldImage,$oldThumbs);
		}
		$productImage->delete();
		return Redirect::back();


	}

	public function getCharts()
	{

		if(Input::get('tab_active')=='month-filter')
		{
			$monthFilter = (Input::has('month_filter')) ? date('Y-m',strtotime('1-' . Input::get('month_filter'))) : date('Y-m');
			$title = 'In Month ' . date('m/Y',strtotime($monthFilter));
			$data = Chart::where('active','1')
						->where(\DB::raw("DATE_FORMAT(time,'%Y-%m')"),$monthFilter)
						->groupBy('time')
						->orderBy('time', 'ASC')
						->get([\DB::raw("DATE_FORMAT(time,'%d') as time"),\DB::raw('SUM(quantity * price) as value')]);

		}

		if(Input::get('tab_active')=='year-filter')
		{
			$yearFilter = (Input::has('year_filter')) ? date('Y',strtotime('1-1-'. Input::get('year_filter'))) : date('Y');
			$title = 'In Year ' . $yearFilter;
			$data = Chart::where('active','1')
						->where(\DB::raw("DATE_FORMAT(time,'%Y')"),$yearFilter)
						->groupBy(\DB::raw("DATE_FORMAT(time,'%Y-%m')"))
						->orderBy(\DB::raw("DATE_FORMAT(time,'%Y-%m')"), 'ASC')
						->get([\DB::raw("DATE_FORMAT(time,'%b') as time"),\DB::raw('SUM(quantity * price) as value')]);

		}

		if(Input::get('tab_active')=='day-filter')
		{
			$fromDate = (Input::has('from_date')) ? date('Y-m-d',strtotime(Input::get('from_date'))) : date('Y-m-d',strtotime('-7 day'));
			$toDate = (Input::has('to_date')) ? date('Y-m-d',strtotime(Input::get('to_date'))) : date('Y-m-d');
			$title = 'From ' . date('d/m/Y',strtotime($fromDate)) . ' To ' . date('d/m/Y',strtotime($toDate));
			$data = Chart::where('active','1')
						->where('time','>=',$fromDate)
						->where('time','<=',$toDate)
						->groupBy('time')
						->orderBy(\DB::raw("DATE_FORMAT(time,'%Y-%m-%d')"), 'ASC')
						->get([\DB::raw("DATE_FORMAT(time,'%d-%m-%Y') as time"),\DB::raw('SUM(quantity * price) as value')]);
			
		}

		if(isset($data) && !empty(json_decode($data)))
		{
					
			foreach ($data as $item) {
				$array['labels'][] = $item->time;
				$array['value'][] = (int)$item->value;
			}
			$jsonData = [
			'title'=>$title,
			'labels' => $array['labels'],
			'value' => $array['value'],

			];
			return $jsonData;
					
		}


	}


}
