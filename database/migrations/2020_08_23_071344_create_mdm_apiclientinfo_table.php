<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmApiclientinfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_apiclientinfo', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 191)->unique();
			$table->string('api_token', 100)->unique();
			$table->string('description', 191)->nullable();
			$table->string('owner', 191)->nullable();
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
		Schema::drop('mdm_apiclientinfo');
	}

}
