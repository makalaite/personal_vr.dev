<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnNamePageIdToRecordIdInPagesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vr_pages_translations', function (Blueprint $table) {
            $table->renameColumn('page_id', 'record_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vr_pages_translations', function (Blueprint $table) {
            $table->renameColumn('record_id', 'page_id');
        });
    }
}
