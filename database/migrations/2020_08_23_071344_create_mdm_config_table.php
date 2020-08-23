<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmConfigTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_config', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('type', 50)->nullable();
			$table->string('code', 50)->nullable();
			$table->string('key', 50)->nullable();
			$table->string('value', 200)->nullable();
			$table->integer('sort')->nullable();
			$table->text('detail')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_config');
	}

}
