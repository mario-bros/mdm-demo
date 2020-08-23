<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmCustomerContactsGrpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_customer_contacts_grp', function(Blueprint $table)
		{
			$table->string('u_id', 50)->nullable();
			$table->text('u_id_grp')->nullable();
			$table->string('matching_column', 50)->nullable();
			$table->string('golden', 50)->nullable();
			$table->string('unit', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_customer_contacts_grp');
	}

}
