<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVrConnectionsRolesPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vr_connections_roles_permissions', function(Blueprint $table)
		{
			$table->foreign('permission_id', 'fk_vr_connections_roles_permissions_vr_permissions1')->references('id')->on('vr_permissions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('role_id', 'fk_vr_connections_roles_permissions_vr_roles')->references('id')->on('vr_roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vr_connections_roles_permissions', function(Blueprint $table)
		{
			$table->dropForeign('fk_vr_connections_roles_permissions_vr_permissions1');
			$table->dropForeign('fk_vr_connections_roles_permissions_vr_roles');
		});
	}

}
