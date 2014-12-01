<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('translations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('key');
			$table->string('lang_code', 5)->default(\Config::get('mahana-translation-manager::translation_manager.default_lang'));
			$table->text('value');
			$table->boolean('requires_update')->default(0);
			$table->boolean('requires_manual_translation')->default(0);
			$table->text('note')->nullable();			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('translations');
	}

}
