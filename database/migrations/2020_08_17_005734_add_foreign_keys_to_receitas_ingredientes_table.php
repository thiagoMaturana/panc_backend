<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToReceitasIngredientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('receitas_ingredientes', function(Blueprint $table)
		{
			$table->foreign('ingredientes_id', 'fk_receitas_has_ingredientes_ingredientes2')->references('id')->on('ingredientes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('receitas_id', 'fk_receitas_has_ingredientes_receitas2')->references('id')->on('receitas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('receitas_ingredientes', function(Blueprint $table)
		{
			$table->dropForeign('fk_receitas_has_ingredientes_ingredientes2');
			$table->dropForeign('fk_receitas_has_ingredientes_receitas2');
		});
	}

}
