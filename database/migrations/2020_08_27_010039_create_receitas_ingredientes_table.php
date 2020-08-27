<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
			$table->foreignId('receitas_id');
			$table->foreignId('ingredientes_id');

			$table->foreign('receitas_id')->references('id')->on('receitas')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('ingredientes_id')->references('id')->on('ingredientes')->onUpdate('cascade')->onDelete('cascade');
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
