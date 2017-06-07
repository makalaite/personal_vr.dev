<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVrConnectionsPagesResourcesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vr_connections_pages_resources', function(Blueprint $table)
		{
			$table->foreign('page_id', 'fk_vr_connections_pages_resources_vr_pages1')->references('id')->on('vr_pages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('resource_id', 'fk_vr_connections_users_resources_vr_resources1')->references('id')->on('vr_resources')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vr_connections_pages_resources', function(Blueprint $table)
		{
			$table->dropForeign('fk_vr_connections_pages_resources_vr_pages1');
			$table->dropForeign('fk_vr_connections_users_resources_vr_resources1');
		});
	}

}
