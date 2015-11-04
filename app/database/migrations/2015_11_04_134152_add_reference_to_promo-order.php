<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferenceToPromoOrder extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('promo_order', function(Blueprint $table)
		{
			$table->integer('promo_id');
			$table->dropColumn('promo_title');
			$table->dropColumn('promo_description');
			$table->dropColumn('active');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('promo_order', function(Blueprint $table)
		{
			$table->dropColumn('promo_id');
			$table->string('promo_title');
			$table->string('promo_description');
			$table->boolean('active');
		});
	}

}
