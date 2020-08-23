<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmCustomerContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_customer_contact', function(Blueprint $table)
		{
			$table->string('u_id')->nullable()->index();
			$table->string('uid_golden')->nullable();
			$table->string('contact_value', 100)->nullable();
			$table->integer('type_contact_id')->nullable();
			$table->integer('status_keaktifan_id')->nullable();
			$table->integer('status_verifikasi_id')->nullable();
			$table->date('verified_at')->nullable();
			$table->integer('status_data')->nullable();
			$table->integer('isPrimary')->nullable();
			$table->integer('created_by')->nullable();
			$table->timestamps();
			$table->integer('updated_by')->nullable();
			$table->integer('mdm_id')->nullable();
			$table->bigInteger('id', true);
			$table->dateTime('process_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_customer_contact');
	}

}
