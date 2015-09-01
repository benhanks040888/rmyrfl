<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralInfo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('general_info', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('key');
			$table->text('title_en');
			$table->text('title_id');
			$table->text('value_en');
			$table->text('value_id');
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
		Schema::drop('general_info');
	}

}
