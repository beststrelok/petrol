<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('user_id');
			$table->boolean('admin');
			$table->string('reminder', 128);
			$table->string('name', 64);
			$table->string('surname', 128);
			$table->string('address', 256);
			$table->string('phone', 32)->nullable();
			$table->string('company', 128)->nullable();
			$table->string('email', 64)->unique();
			$table->string('password', 128);
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}
}
