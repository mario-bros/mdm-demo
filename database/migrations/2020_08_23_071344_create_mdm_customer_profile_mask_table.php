<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmCustomerProfileMaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_customer_profile_mask', function(Blueprint $table)
		{
			$table->string('u_id', 50)->nullable()->index();
			$table->string('uid_golden', 50)->nullable()->index();
			$table->string('customer_id', 50)->nullable();
			$table->string('full_name', 250)->nullable();
			$table->string('first_name', 250)->nullable();
			$table->string('middle_name', 100)->nullable();
			$table->string('last_name', 250)->nullable();
			$table->string('surname', 50)->nullable();
			$table->string('nickname', 50)->nullable();
			$table->string('gender', 50)->nullable();
			$table->date('dob')->nullable();
			$table->string('pob_id', 50)->nullable();
			$table->integer('suku_id')->nullable();
			$table->integer('kewarganegaraan_id')->nullable();
			$table->integer('negara_id')->nullable();
			$table->integer('religion_id')->nullable();
			$table->integer('pendidikan_id')->nullable();
			$table->integer('profesi_id')->nullable();
			$table->integer('golongan_darah_id')->nullable();
			$table->integer('status_kawin_id')->nullable();
			$table->integer('mortalitas_id')->nullable();
			$table->integer('status_keaktifan_id')->nullable();
			$table->integer('status_pengkinian_data_id')->nullable();
			$table->integer('category_user_id')->nullable();
			$table->string('foto')->nullable();
			$table->string('email')->nullable();
			$table->integer('mdm_id')->nullable();
			$table->string('golden', 5)->nullable();
			$table->integer('created_by')->nullable();
			$table->timestamps();
			$table->integer('updated_by')->nullable();
			$table->integer('deleted_by')->nullable();
			$table->softDeletes();
			$table->integer('flag_process')->nullable();
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
		Schema::drop('mdm_customer_profile_mask');
	}

}
