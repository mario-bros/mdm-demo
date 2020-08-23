<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmCustomerAttachmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_customer_attachment', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('u_id')->nullable();
			$table->integer('customer_identity_id')->nullable();
			$table->string('filename')->nullable();
			$table->integer('type_file_id')->nullable();
			$table->text('description')->nullable();
			$table->integer('created_by')->nullable();
			$table->timestamps();
			$table->integer('updated_by')->nullable();
			$table->integer('mdm_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_customer_attachment');
	}

}
