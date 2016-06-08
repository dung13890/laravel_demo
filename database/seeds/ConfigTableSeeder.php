<?php

use Illuminate\Database\Seeder;


class ConfigTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('config')->delete();
		$config = [
		['group' => 'active','title' => "Yes",'value' => '1','created_at'=>date('Y-m-d h:i:s'),'updated_at' => date('Y-m-d h:i:s')],
		['group' => 'active','title' => "No",'value' => '2','created_at'=>date('Y-m-d h:i:s'),'updated_at' => date('Y-m-d h:i:s')]
		];

		DB::table('config')->insert($config);
	}

}
