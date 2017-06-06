<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVrRolesPermissionsConnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vr_roles_permissions_conn', function(Blueprint $table)
		{
			$table->foreign('permission_id', 'fk_vr_user_roles_conn_copy1_vr_permissions1')->references('id')->on('vr_permissions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('role_id', 'fk_vr_user_roles_conn_vr_roles10')->references('id')->on('vr_roles')->onUpdate('NO ACTION')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vr_roles_permissions_conn', function(Blueprint $table)
		{
			$table->dropForeign('fk_vr_user_roles_conn_copy1_vr_permissions1');
			$table->dropForeign('fk_vr_user_roles_conn_vr_roles10');
		});
	}

}
