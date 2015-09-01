<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimony extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('testimony', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('position');
			$table->string('photo');
			$table->text('content_en');
			$table->text('content_id');
			$table->string('category');
			$table->boolean('featured')->default(0);
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
		Schema::drop('testimony');
	}

}
