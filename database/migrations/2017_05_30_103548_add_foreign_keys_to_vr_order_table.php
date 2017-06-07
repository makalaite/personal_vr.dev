<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToVrOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vr_order', function(Blueprint $table)
        {
            $table->foreign('user_id', 'fk_vr_order_vr_users1')->references('id')->on('vr_users')->onUpdate('NO ACTION')->onDelete('NO ACTION');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vr_order', function(Blueprint $table)
        {
            $table->dropForeign('fk_vr_order_vr_users1');
        });
    }
}
