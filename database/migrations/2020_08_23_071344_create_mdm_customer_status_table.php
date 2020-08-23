<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmCustomerStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_customer_status', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('u_id')->nullable();
			$table->string('message')->nullable();
			$table->integer('flag_process')->nullable();
			$table->integer('user_id')->nullable();
			$table->timestamps();
			$table->integer('is_rejected')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_customer_status');
	}

}
