<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPlantasReceitasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('plantas_receitas', function(Blueprint $table)
		{
			$table->foreign('plantas_id', 'fk_plantas_has_receitas_plantas1')->references('id')->on('plantas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('receitas_id', 'fk_plantas_has_receitas_receitas1')->references('id')->on('receitas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('plantas_receitas', function(Blueprint $table)
		{
			$table->dropForeign('fk_plantas_has_receitas_plantas1');
			$table->dropForeign('fk_plantas_has_receitas_receitas1');
		});
	}

}
