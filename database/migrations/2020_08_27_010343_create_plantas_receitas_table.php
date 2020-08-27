<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
			$table->foreignId('receitas_id');
			$table->foreignId('plantas_id');
			$table->string('quantidade', 100);

			$table->foreign('receitas_id')->references('id')->on('receitas')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('plantas_id')->references('id')->on('plantas')->onUpdate('cascade')->onDelete('cascade');
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
