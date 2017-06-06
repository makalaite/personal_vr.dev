<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVrCategoriesTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vr_categories_translations', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->string('category_id', 36)->nullable()->index('fk_vr_page_category_translations_vr_pages_category1_idx');
			$table->string('language_id', 36)->nullable()->index('fk_vr_page_category_translations_vr_languages1_idx');
			$table->string('name');
			$table->string('slug')->unique('slug_UNIQUE');
			$table->unique(['category_id','language_id'], 'category_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vr_categories_translations');
	}

}
