<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmCustomerProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_customer_product', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('u_id', 250)->nullable()->index();
			$table->string('uid_golden', 250)->nullable()->index('mdm_customer_product_uid_golden_idx');
			$table->string('customer_id', 30)->nullable();
			$table->string('product', 100)->nullable();
			$table->integer('created_by')->nullable();
			$table->timestamps();
			$table->integer('updated_by')->nullable();
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
		Schema::drop('mdm_customer_product');
	}

}
