<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmMstKecamatanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_mst_kecamatan', function(Blueprint $table)
		{
			$table->char('id', 7)->primary('tbl_kecamatan_pkey');
			$table->char('regency_id', 4)->index('idx_kec_regid');
			$table->string('name')->index('idx_kec_name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_mst_kecamatan');
	}

}
