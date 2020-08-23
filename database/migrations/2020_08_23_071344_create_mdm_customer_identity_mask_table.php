<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmCustomerIdentityMaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_customer_identity_mask', function(Blueprint $table)
		{
			$table->string('u_id', 50)->nullable()->index();
			$table->string('uid_golden', 50)->nullable();
			$table->integer('category_identity_id')->nullable();
			$table->string('nomor_identity', 50)->nullable();
			$table->string('masa_berlaku')->nullable();
			$table->string('status_data', 30)->nullable();
			$table->string('description')->nullable();
			$table->integer('isPrimary')->nullable();
			$table->integer('created_by')->nullable();
			$table->timestamps();
			$table->integer('updated_by')->nullable();
			$table->integer('mdm_id')->nullable();
			$table->string('batch', 30)->nullable();
			$table->bigInteger('id', true);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_customer_identity_mask');
	}

}
