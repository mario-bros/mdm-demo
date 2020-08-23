<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmCustomerUnitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_customer_unit', function(Blueprint $table)
		{
			$table->string('u_id', 250)->nullable()->index();
			$table->string('uid_golden', 250)->nullable()->index('mdm_customer_unit_uid_golden_idx');
			$table->string('unit', 250)->nullable();
			$table->integer('status_keaktifan_id')->nullable();
			$table->string('url_profile', 100)->nullable();
			$table->string('Load_Date', 50)->nullable();
			$table->integer('mdm_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->integer('created_by')->nullable();
			$table->timestamps();
			$table->integer('updated_by')->nullable();
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
		Schema::drop('mdm_customer_unit');
	}

}
