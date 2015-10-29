<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePromo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('promo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title_en');
			$table->string('title_id');
			$table->text('content_en');
			$table->text('content_id');
			$table->string('picture');
			$table->boolean('active')->default(0);
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
		Schema::drop('promo');
	}

}
