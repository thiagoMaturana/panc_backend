<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNomesPopularesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nomes_populares', function(Blueprint $table)
		{
			$table->foreign('plantas_id', 'fk_nomes_populares_plantas1')->references('id')->on('plantas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('nomes_populares', function(Blueprint $table)
		{
			$table->dropForeign('fk_nomes_populares_plantas1');
		});
	}

}
