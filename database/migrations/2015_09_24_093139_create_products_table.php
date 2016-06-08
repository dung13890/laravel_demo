<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('code');
			$table->string('title');
			$table->string('slug');
			$table->string('tags');
			$table->string('model');
			$table->text('content');
			$table->integer('price');
			$table->tinyInteger('sale')->default('1');
			$table->integer('price_sale');
			$table->string('image');
			$table->integer('product_category_id');
			$table->integer('view');
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
		Schema::drop('products');
	}

}
