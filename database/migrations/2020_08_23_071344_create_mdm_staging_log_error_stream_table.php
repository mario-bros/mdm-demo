<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmStagingLogErrorStreamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_staging_log_error_stream', function(Blueprint $table)
		{
			$table->integer('log_id', true);
			$table->string('u_id', 250)->nullable();
			$table->string('table_fr', 100)->nullable();
			$table->string('process_name', 100)->nullable();
			$table->string('batch', 50)->nullable();
			$table->string('unit', 100)->nullable();
			$table->dateTime('created_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_staging_log_error_stream');
	}

}
