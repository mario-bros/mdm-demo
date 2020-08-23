<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmCustomerContactsRelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_customer_contacts_rel', function(Blueprint $table)
		{
			$table->string('u_id1', 50)->nullable();
			$table->string('u_id2', 50)->nullable();
			$table->text('relation')->nullable();
			$table->text('u_id_grp')->nullable();
			$table->string('matching_column', 50)->nullable();
			$table->float('lev_name', 10, 0)->nullable();
			$table->float('lev_addr', 10, 0)->nullable();
			$table->float('cnt_data', 10, 0)->nullable();
			$table->string('unit1', 50)->nullable();
			$table->string('unit2', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_customer_contacts_rel');
	}

}
