<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmCustomerProfileWebTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_customer_profile_web', function(Blueprint $table)
		{
			$table->string('u_id', 250)->nullable()->index('mdm_customer_profile_web_u_id_idx');
			$table->string('uid_golden', 250)->nullable()->index('mdm_customer_profile_web_uid_golden_idx');
			$table->string('unit', 50)->nullable();
			$table->string('customer_id', 100)->nullable()->index('mdm_customer_profile_web_customer_id_idx');
			$table->string('full_name', 250)->nullable();
			$table->string('first_name', 250)->nullable();
			$table->string('middle_name', 250)->nullable();
			$table->string('last_name', 250)->nullable();
			$table->string('surname', 250)->nullable();
			$table->string('nickname', 250)->nullable();
			$table->string('gender', 50)->nullable();
			$table->date('dob')->nullable();
			$table->string('pob_id', 50)->nullable();
			$table->string('address')->nullable();
			$table->string('nomor', 20)->nullable();
			$table->string('blok', 10)->nullable();
			$table->string('rt', 20)->nullable();
			$table->string('rw', 20)->nullable();
			$table->string('kelurahan_id', 20)->nullable();
			$table->string('kecamatan_id', 20)->nullable();
			$table->string('kota_id', 20)->nullable()->index('mdm_customer_profile_web_kota_id_idx');
			$table->string('propinsi_id', 20)->nullable();
			$table->string('kodepos', 20)->nullable();
			$table->string('longitude')->nullable();
			$table->string('latitude')->nullable();
			$table->string('status_tempat_tinggal_id', 20)->nullable();
			$table->string('type_tempat_tinggal_id', 20)->nullable();
			$table->string('category_tempat_tinggal_id', 20)->nullable();
			$table->string('email1', 100)->nullable()->index('mdm_customer_profile_web_email1_idx');
			$table->string('email2', 100)->nullable();
			$table->string('telepon_rumah', 50)->nullable();
			$table->string('telepon_kantor', 50)->nullable();
			$table->string('fax', 50)->nullable();
			$table->string('mobile_phone1', 50)->nullable();
			$table->string('mobile_phone2', 50)->nullable();
			$table->string('ktp', 50)->nullable();
			$table->integer('category_identity_id')->nullable();
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
			$table->string('golden', 5)->nullable();
			$table->integer('flag_process')->nullable();
			$table->dateTime('process_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('created_by')->nullable();
			$table->timestamps();
			$table->integer('updated_by')->nullable();
			$table->integer('deleted_by')->nullable();
			$table->softDeletes();
			$table->integer('id', true);
			$table->integer('flag_mask')->nullable()->default(0);
			$table->string('batch', 100)->nullable();
			$table->string('status_ktp', 5)->nullable();
			$table->string('title_pre', 50)->nullable();
			$table->string('title_suf', 50)->nullable();
			$table->string('jabatan', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_customer_profile_web');
	}

}
