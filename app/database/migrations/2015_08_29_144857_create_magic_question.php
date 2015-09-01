<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagicQuestion extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('magic-question', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('question_en');
			$table->string('question_id');
			$table->string('answer_en');
			$table->string('answer_id');
			$table->string('picture');
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
		Schema::drop('magic-question');
	}

}
