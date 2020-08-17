<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceitasIngredientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receitas_ingredientes', function(Blueprint $table)
		{
			$table->integer('receitas_id')->index('fk_receitas_has_ingredientes_receitas2_idx');
			$table->integer('ingredientes_id')->index('fk_receitas_has_ingredientes_ingredientes2_idx');
			$table->primary(['receitas_id','ingredientes_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('receitas_ingredientes');
	}

}
