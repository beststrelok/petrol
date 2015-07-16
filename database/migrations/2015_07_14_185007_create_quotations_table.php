<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('quotations', function(Blueprint $table)
		{	
			$table->increments('quotation_id');
			$table->decimal('A76_80', 12, 6);
			$table->decimal('A92', 12, 6);
			$table->decimal('A95', 12, 6);
			$table->integer('region_id')->unsigned()->index();
			$table->timestamp('added_on');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('quotations');
	}

}
