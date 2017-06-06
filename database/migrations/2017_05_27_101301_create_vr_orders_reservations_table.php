<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVrOrdersReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vr_orders_reservations', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->dateTime('datetime');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('order_id', 36)->nullable()->index('fk_vr_order_times_experiences_conn_vr_order1_idx');
			$table->string('page_experience_id', 36)->nullable()->index('fk_vr_order_times_experiences_conn_vr_pages1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vr_orders_reservations');
	}

}
