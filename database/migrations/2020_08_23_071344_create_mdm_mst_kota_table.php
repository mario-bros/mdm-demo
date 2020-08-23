<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmMstKotaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_mst_kota', function(Blueprint $table)
		{
			$table->char('id', 4)->primary('tbl_kota_pkey');
			$table->char('province_id', 2)->index('idx_kot_provid');
			$table->string('name')->index('idx_kot_name');
			$table->integer('kode_area');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_mst_kota');
	}

}
