<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendars', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->timestamp('start_time');
			$table->timestamp('end_time');
			$table->text('content');
			$table->tinyInteger('status')->default('1');
			$table->integer('user_id');
			$table->tinyInteger('active')->default('1');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('calendars');
	}

}
