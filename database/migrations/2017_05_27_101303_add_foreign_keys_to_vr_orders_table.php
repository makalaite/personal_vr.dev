<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVrOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vr_orders', function(Blueprint $table)
		{
			$table->foreign('user_id', 'fk_vr_orders_vr_users1')->references('id')->on('vr_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vr_orders', function(Blueprint $table)
		{
			$table->dropForeign('fk_vr_orders_vr_users1');
		});
	}

}
