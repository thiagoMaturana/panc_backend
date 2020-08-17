<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlantasReceitasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plantas_receitas', function(Blueprint $table)
		{
			$table->integer('plantas_id')->index('fk_plantas_has_receitas_plantas1_idx');
			$table->integer('receitas_id')->index('fk_plantas_has_receitas_receitas1_idx');
			$table->string('quantidade', 45);
			$table->primary(['plantas_id','receitas_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plantas_receitas');
	}

}
