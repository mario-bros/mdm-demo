<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmMstCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_mst_company', function(Blueprint $table)
		{
			$table->string('id', 10)->primary('mdm_mst_company_pk');
			$table->string('full_name', 50);
			$table->char('isholding', 1)->nullable();
			$table->string('address', 250)->nullable();
			$table->string('website', 100)->nullable();
			$table->integer('oracle_code')->nullable();
			$table->string('brand_name', 50)->nullable();
			$table->string('email', 50)->nullable();
			$table->string('holding', 10)->nullable();
			$table->string('db_schema', 50)->nullable();
			$table->string('db_user', 50)->nullable();
			$table->string('db_passwd', 50)->nullable();
			$table->text('masking_set')->nullable();
			$table->string('api_secret_key', 100)->nullable()->unique();
			$table->smallInteger('clean_job')->nullable();
			$table->string('tbl_profile', 100)->nullable();
			$table->dateTime('last_clean_job')->nullable();
			$table->dateTime('last_update')->nullable();
			$table->string('pic1_name', 50)->nullable();
			$table->string('pic1_email', 50)->nullable();
			$table->string('pic1_hp', 15)->nullable();
			$table->string('pic2_name', 50)->nullable();
			$table->string('pic2_email', 50)->nullable();
			$table->string('pic2_hp', 15)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_mst_company');
	}

}
