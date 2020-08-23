<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmProcessHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_process_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('batch', 20);
			$table->string('unit', 50)->nullable();
			$table->string('data_name', 50);
			$table->integer('data_val');
			$table->string('notes', 200)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_process_history');
	}

}
