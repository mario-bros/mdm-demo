<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmMstCountryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_mst_country', function(Blueprint $table)
		{
			$table->string('country', 50)->nullable();
			$table->string('code_2', 3)->nullable();
			$table->string('code_3', 4)->nullable();
			$table->string('code_number', 5)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_mst_country');
	}

}
