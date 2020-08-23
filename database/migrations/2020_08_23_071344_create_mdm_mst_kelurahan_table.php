<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmMstKelurahanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_mst_kelurahan', function(Blueprint $table)
		{
			$table->char('id', 10)->primary('tbl_kelurahan_pkey');
			$table->char('district_id', 7);
			$table->string('name');
			$table->unique(['name','id'], 'mdm_mst_kelurahan_name_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_mst_kelurahan');
	}

}
