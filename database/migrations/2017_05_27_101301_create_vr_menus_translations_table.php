<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVrMenusTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vr_menus_translations', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->string('id', 36)->unique('id_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->string('menu_id', 36)->nullable()->index('fk_vr_menu_translations_vr_menu1_idx');
			$table->string('language_id', 36)->nullable()->index('fk_vr_menu_translations_vr_languages1_idx');
			$table->string('name');
			$table->string('slug')->unique('slug_UNIQUE');
			$table->unique(['menu_id','language_id'], 'menu_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vr_menus_translations');
	}

}
