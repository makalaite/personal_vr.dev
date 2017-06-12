<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnNameCategoryIdToRecordIdInCategoriesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vr_categories_translations', function (Blueprint $table) {
            $table->renameColumn('category_id', 'record_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vr_categories_translations', function (Blueprint $table) {
            $table->renameColumn('record_id', 'category_id');
        });
    }
}
