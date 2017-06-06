<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVrRolesPermissionsConnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vr_roles_permissions_conn', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('permission_id', 36)->nullable()->index('fk_vr_user_roles_conn_copy1_vr_permissions1_idx');
			$table->string('role_id', 36)->nullable()->index('fk_vr_user_roles_conn_vr_roles1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vr_roles_permissions_conn');
	}

}
