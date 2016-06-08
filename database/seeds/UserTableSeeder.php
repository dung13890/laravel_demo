<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();
		$datetime = date('Y-m-d H:i:s');
		$password = bcrypt('123456');

		\App\User::create([
			'name' =>'Mr Dũng',
			'username' => 'admin',
			'password' => $password,
			'email' => 'admin@admin.com',
			'role' => '2',
			'created_at' => $datetime,
			'updated_at' => $datetime,
			]);
		\App\User::create([
			'name' =>'User',
			'username' => 'user',
			'password' => $password,
			'email' => 'user@user.com',
			'role' => '1',
			'created_at' => $datetime,
			'updated_at' => $datetime,
			]);

	}

}
