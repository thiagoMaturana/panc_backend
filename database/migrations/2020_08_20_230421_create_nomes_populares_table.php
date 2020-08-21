<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNomesPopularesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nomes_populares', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 45);
			$table->integer('plantas_id')->index('fk__plantas1_idx');
			$table->primary(['id','plantas_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nomes_populares');
	}

}
