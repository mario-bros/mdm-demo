<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin_users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('username', 190)->unique();
			$table->string('password', 60);
			$table->string('name', 191);
			$table->string('avatar', 191)->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->string('unit_id', 10)->nullable();
			$table->string('email', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admin_users');
	}

}
