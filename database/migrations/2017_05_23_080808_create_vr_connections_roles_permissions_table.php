<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVrConnectionsRolesPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vr_connections_roles_permissions', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('role_id', 36)->index('fk_vr_connections_roles_permissions_vr_roles_idx');
			$table->string('permission_id', 36)->index('fk_vr_connections_roles_permissions_vr_permissions1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vr_connections_roles_permissions');
	}

}
