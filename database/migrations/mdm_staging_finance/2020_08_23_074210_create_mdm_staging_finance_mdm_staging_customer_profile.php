<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmStagingFinanceMdmStagingCustomerProfile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// $currentDBConfigs = $this->setDBConnectionConfig('FINA');
		// \Config::set('database.connections.FINA', $currentDBConfigs);
		
		Schema::connection('FINA')->create('mdm_staging_customer_profile', function(Blueprint $table)
		{
			$table->string('u_id', 250)->primary('mdm_staging_customer_profile_pkey');
			$table->string('unit', 50)->nullable()->default('FINA');
			$table->string('customer_id', 50)->nullable();
			$table->string('full_name', 250)->nullable();
			$table->string('first_name', 100)->nullable();
			$table->string('middle_name', 100)->nullable();
			$table->string('last_name', 100)->nullable();
			$table->string('surname', 50)->nullable();
			$table->string('nickname', 50)->nullable();
			$table->string('gender', 50)->nullable();
			$table->date('dob')->nullable();
			$table->string('pob', 50)->nullable();
			$table->string('address', 250)->nullable();
			$table->char('nomor', 10)->nullable();
			$table->char('blok', 10)->nullable();
			$table->char('rt', 10)->nullable();
			$table->char('rw', 10)->nullable();
			$table->string('kelurahan', 50)->nullable();
			$table->string('kecamatan', 50)->nullable();
			$table->string('kota', 50)->nullable();
			$table->string('propinsi', 50)->nullable();
			$table->char('kodepos', 10)->nullable();
			$table->string('longitude', 50)->nullable();
			$table->string('latitude', 50)->nullable();
			$table->string('status_tempat_tinggal', 50)->nullable();
			$table->string('type_tempat_tinggal', 50)->nullable();
			$table->string('category_tempat_tinggal', 50)->nullable();
			$table->string('email1', 100)->nullable();
			$table->string('email2', 100)->nullable();
			$table->string('telepon_rumah', 50)->nullable();
			$table->string('telepon_kantor', 50)->nullable();
			$table->string('fax', 50)->nullable();
			$table->string('mobile_phone1', 50)->nullable();
			$table->string('mobile_phone2', 50)->nullable();
			$table->string('ktp', 50)->nullable();
			$table->string('suku', 50)->nullable();
			$table->string('kewarganegaraan', 50)->nullable();
			$table->string('negara', 50)->nullable();
			$table->string('religion', 50)->nullable();
			$table->string('pendidikan', 50)->nullable();
			$table->string('profesi', 50)->nullable();
			$table->char('golongan_darah', 10)->nullable();
			$table->string('status_kawin', 50)->nullable();
			$table->string('mortalitas', 50)->nullable();
			$table->string('category_user', 50)->nullable();
			$table->string('status_keaktifan', 50)->nullable();
			$table->string('status_pengkinian_data', 50)->nullable();
			$table->string('product', 2000)->nullable();
			$table->timestamps();
			$table->smallInteger('flag_process')->nullable();
			$table->dateTime('process_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('category', 50)->nullable();
			$table->string('id_type', 50)->nullable();
			$table->string('home_address_2', 250)->nullable();
			$table->string('kode_pos', 10)->nullable();
			$table->string('home_country', 50)->nullable();
			$table->string('jabatan', 100)->nullable();
			$table->string('annual_income', 50)->nullable();
			$table->string('source_of_addl_income', 50)->nullable();
			$table->string('additional_income', 50)->nullable();
			$table->string('spouse_full_name', 100)->nullable();
			$table->string('spouse_middle_name', 100)->nullable();
			$table->string('spouse_last_name', 100)->nullable();
			$table->string('spouse_relationship', 50)->nullable();
			$table->dateTime('spouse_date_of_birth')->nullable();
			$table->string('spouse_place_of_birth', 50)->nullable();
			$table->string('spouse_gender', 50)->nullable();
			$table->string('spouse_marital_status', 50)->nullable();
			$table->string('spouse_religion', 50)->nullable();
			$table->string('spouse_nationality', 50)->nullable();
			$table->string('spouse_id_type', 50)->nullable();
			$table->string('spouse_id_no', 50)->nullable();
			$table->string('spouse_home_address_1', 250)->nullable();
			$table->string('spouse_home_address_2', 250)->nullable();
			$table->string('spouse_home_district', 50)->nullable();
			$table->string('spouse_home_subdistrict', 50)->nullable();
			$table->string('spouse_home_city', 50)->nullable();
			$table->string('spouse_home_province', 50)->nullable();
			$table->string('spouse_home_postal_code', 10)->nullable();
			$table->string('spouse_home_country', 50)->nullable();
			$table->string('spouse_house_status', 50)->nullable();
			$table->string('spouse_home_phone_no', 50)->nullable();
			$table->string('spouse_mobile_phone_no', 50)->nullable();
			$table->string('spouse_email_address', 100)->nullable();
			$table->string('spouse_occupation', 50)->nullable();
			$table->string('spouse_current_position', 100)->nullable();
			$table->string('rowcsum', 50)->nullable();
			$table->string('custid_org', 50)->nullable();
			$table->string('unit_org', 50)->nullable();
			$table->string('status_org', 50)->nullable();
			$table->integer('flag_mask')->nullable();
			$table->integer('flag_share')->nullable();
			$table->dateTime('deactivate_date')->nullable();
			$table->string('status_customer', 50)->nullable();
			$table->string('relasi', 50)->nullable();
			$table->string('title_pre', 50)->nullable();
			$table->string('title_suf', 50)->nullable();
			$table->string('title_name', 250)->nullable();
			$table->string('title_err', 50)->nullable();
			$table->smallInteger('address_verified')->nullable();
			$table->smallInteger('email1_verified')->nullable();
			$table->smallInteger('email2_verified')->nullable();
			$table->smallInteger('mobile_phone1_verified')->nullable();
			$table->smallInteger('mobile_phone2_verified')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('FINA')->drop('mdm_staging_customer_profile');
	}

	/*protected function setDBConnectionConfig($confPath = 'TEST')
    {
        $arr = [];
        $folderPath = base_path() . '/config/database/business-units';
        foreach (scandir($folderPath) as $filename) {

            $filePath = $folderPath . '/' . $filename;
            if (is_file($filePath)) {
                $arr += include $filePath;
            }
        }

        
        return $arr[$confPath];
    }*/

}
