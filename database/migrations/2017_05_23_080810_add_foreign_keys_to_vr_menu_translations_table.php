<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVrMenuTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vr_menu_translations', function(Blueprint $table)
		{
			$table->foreign('language_code', 'fk_vr_menu_translations_vr_language_codes1')->references('language_code')->on('vr_language_codes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('menu_id', 'fk_vr_menu_translations_vr_menu1')->references('id')->on('vr_menu')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vr_menu_translations', function(Blueprint $table)
		{
			$table->dropForeign('fk_vr_menu_translations_vr_language_codes1');
			$table->dropForeign('fk_vr_menu_translations_vr_menu1');
		});
	}

}
