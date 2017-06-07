<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVrConnectionsUsersRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vr_connections_users_roles', function(Blueprint $table)
		{
			$table->foreign('role_id', 'fk_vr_connections_users_roles_vr_roles1')->references('id')->on('vr_roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_vr_connections_users_roles_vr_users1')->references('id')->on('vr_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vr_connections_users_roles', function(Blueprint $table)
		{
			$table->dropForeign('fk_vr_connections_users_roles_vr_roles1');
			$table->dropForeign('fk_vr_connections_users_roles_vr_users1');
		});
	}

}
