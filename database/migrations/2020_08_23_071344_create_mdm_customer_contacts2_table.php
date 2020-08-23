<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmCustomerContacts2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_customer_contacts2', function(Blueprint $table)
		{
			$table->string('u_id', 50)->nullable();
			$table->string('status_data', 30)->nullable();
			$table->integer('type_contact_id')->nullable();
			$table->string('contact_value', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_customer_contacts2');
	}

}
