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
			$table->integer('plantas_id')->index('fk_nomes_populares_plantas1_idx');
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
