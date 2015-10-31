<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFilePromo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('promo', function(Blueprint $table)
		{
			$table->string('file_name');
			$table->string('file_location');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('promo', function(Blueprint $table)
		{
			$table->dropColumn('file_name');
			$table->dropColumn('file_location');
		});
	}

}
