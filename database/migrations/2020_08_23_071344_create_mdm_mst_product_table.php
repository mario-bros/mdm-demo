<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmMstProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_mst_product', function(Blueprint $table)
		{
			$table->string('product_id', 20)->primary('mdm_mst_product_pk');
			$table->string('unit', 10)->nullable();
			$table->string('full_name', 100)->nullable();
			$table->text('description')->nullable();
			$table->float('price', 10, 0)->nullable();
			$table->string('charge_period', 20)->nullable();
			$table->string('product_type', 20)->nullable();
			$table->string('product_segment', 20)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_mst_product');
	}

}
