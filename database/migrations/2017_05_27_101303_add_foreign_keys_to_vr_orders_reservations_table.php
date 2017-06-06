<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVrOrdersReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vr_orders_reservations', function(Blueprint $table)
		{
			$table->foreign('order_id', 'fk_vr_order_times_experiences_conn_vr_order1')->references('id')->on('vr_orders')->onUpdate('NO ACTION')->onDelete('CASCADE');
			$table->foreign('page_experience_id', 'fk_vr_order_times_experiences_conn_vr_pages1')->references('id')->on('vr_pages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vr_orders_reservations', function(Blueprint $table)
		{
			$table->dropForeign('fk_vr_order_times_experiences_conn_vr_order1');
			$table->dropForeign('fk_vr_order_times_experiences_conn_vr_pages1');
		});
	}

}
