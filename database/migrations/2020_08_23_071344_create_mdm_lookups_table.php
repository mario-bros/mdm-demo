<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMdmLookupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mdm_lookups', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('lookup_name', 50)->nullable()->index('idx_look_name');
			$table->string('category', 50)->nullable()->index('idx_look_category');
			$table->integer('priority')->nullable();
			$table->string('kode', 50)->nullable();
			$table->char('parent_kode', 10)->nullable();
			$table->string('description', 250)->nullable();
			$table->string('unit', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mdm_lookups');
	}

}
