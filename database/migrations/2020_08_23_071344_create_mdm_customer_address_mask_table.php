<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmCustomerAddressMaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_customer_address_mask', function(Blueprint $table)
		{
			$table->string('u_id', 50)->nullable()->index();
			$table->string('uid_golden', 50)->nullable();
			$table->string('address')->nullable();
			$table->string('nomor', 20)->nullable();
			$table->string('blok', 10)->nullable();
			$table->string('rt', 20)->nullable();
			$table->string('rw', 20)->nullable();
			$table->string('kelurahan_id', 20)->nullable();
			$table->string('kecamatan_id', 20)->nullable();
			$table->string('kota_id', 20)->nullable();
			$table->string('propinsi_id', 20)->nullable();
			$table->string('kodepos', 20)->nullable();
			$table->string('longitude', 50)->nullable();
			$table->string('latitude', 50)->nullable();
			$table->string('status_tempat_tinggal_id', 20)->nullable();
			$table->string('type_tempat_tinggal_id', 20)->nullable();
			$table->string('category_tempat_tinggal_id', 20)->nullable();
			$table->integer('status_keaktifan_id')->nullable();
			$table->integer('status_data')->nullable();
			$table->string('status_alamat', 50)->nullable();
			$table->integer('isPrimary')->nullable();
			$table->integer('created_by')->nullable();
			$table->timestamps();
			$table->integer('updated_by')->nullable();
			$table->integer('mdm_id')->nullable();
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
		Schema::drop('mdm_customer_address_mask');
	}

}
