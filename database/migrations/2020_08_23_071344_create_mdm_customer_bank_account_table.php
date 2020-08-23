<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmCustomerBankAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_customer_bank_account', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('u_id')->nullable()->index();
			$table->string('nama_bank', 100)->nullable();
			$table->string('cabang', 50)->nullable();
			$table->string('nomor_rekening', 50)->nullable();
			$table->string('atas_nama', 50)->nullable();
			$table->integer('status_keaktifan_id')->nullable();
			$table->integer('status_data')->nullable();
			$table->integer('isPrimary')->nullable();
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
		Schema::drop('mdm_customer_bank_account');
	}

}
