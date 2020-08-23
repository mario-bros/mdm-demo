<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmStagingCustomerProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_staging_customer_product', function(Blueprint $table)
		{
			$table->string('customer_id', 100)->nullable();
			$table->string('product_code', 100)->nullable();
			$table->string('product_desc', 100)->nullable();
			$table->string('u_id', 250)->nullable()->index('mdm_staging_customer_product_u_id_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_staging_customer_product');
	}

}
