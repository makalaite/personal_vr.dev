<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNewWindowColumnToTinyIntInVrMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vr_menu', function (Blueprint $table) {
            $table->boolean('new_window')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vr_menu', function (Blueprint $table) {
            $table->string('new_window')->nullable()->change();
        });
    }
}
