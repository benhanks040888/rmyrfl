<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductPromo extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product', function(Blueprint $table)
		{
			$table->boolean('is_promo')->default(0);
			$table->string('promo_label_en');
			$table->string('promo_label_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product', function(Blueprint $table)
		{
			$table->dropColumn('is_promo');
			$table->dropColumn('promo_label_en');
			$table->dropColumn('promo_label_id');
		});
	}

}
