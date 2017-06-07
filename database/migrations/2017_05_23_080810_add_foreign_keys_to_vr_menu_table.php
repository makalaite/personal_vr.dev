<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVrMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vr_menu', function(Blueprint $table)
		{
			$table->foreign('vr_parent_id', 'fk_vr_menu_vr_menu1')->references('id')->on('vr_menu')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vr_menu', function(Blueprint $table)
		{
			$table->dropForeign('fk_vr_menu_vr_menu1');
		});
	}

}
