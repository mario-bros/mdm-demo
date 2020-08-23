<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmStagingDictionaryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_staging_dictionary', function(Blueprint $table)
		{
			$table->text('old_name')->nullable();
			$table->text('new_name')->nullable();
			$table->text('category')->nullable();
			// $table->index(['old_name','category'], 'mdm_staging_dictionary_old_name_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_staging_dictionary');
	}

}
