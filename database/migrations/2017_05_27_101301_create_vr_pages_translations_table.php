<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVrPagesTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vr_pages_translations', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->string('page_id', 36)->nullable()->index('fk_vr_page_translations_vr_pages1_idx');
			$table->string('language_id', 36)->nullable()->index('fk_vr_page_translations_vr_languages1_idx');
			$table->string('title');
			$table->string('description_short')->nullable();
			$table->text('description_long', 65535)->nullable();
			$table->string('slug')->unique('slug_UNIQUE');
			$table->unique(['page_id','language_id'], 'page_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vr_pages_translations');
	}

}
