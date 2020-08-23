<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmCustomerRelationshipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_customer_relationship', function(Blueprint $table)
		{
			$table->string('u_id')->nullable();
			$table->string('first_name', 50)->nullable();
			$table->string('last_name', 50)->nullable();
			$table->string('dob', 50)->nullable();
			$table->integer('pob_id')->nullable();
			$table->string('address')->nullable();
			$table->string('mobile_phone', 20)->nullable();
			$table->string('telephone', 20)->nullable();
			$table->string('email', 50)->nullable();
			$table->string('gender', 50)->nullable();
			$table->integer('religion_id')->nullable();
			$table->integer('profesi_id')->nullable();
			$table->integer('status_kawin_id')->nullable();
			$table->integer('relationship_id')->nullable();
			$table->integer('category_identity_id')->nullable();
			$table->string('nomor_identity', 50)->nullable();
			$table->string('masa_berlaku')->nullable();
			$table->integer('status_data')->nullable();
			$table->integer('created_by')->nullable();
			$table->timestamps();
			$table->integer('updated_by')->nullable();
			$table->integer('mdm_id')->nullable();
			$table->integer('id', true);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_customer_relationship');
	}

}
