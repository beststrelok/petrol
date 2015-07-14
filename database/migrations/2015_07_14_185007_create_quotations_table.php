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
			$table->decimal('price', 12, 6);
			$table->integer('petrol_id')->unsigned()->index();
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
