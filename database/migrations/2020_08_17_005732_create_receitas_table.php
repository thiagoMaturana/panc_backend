<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceitasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receitas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 100);
			$table->string('tipo', 45);
			$table->string('modoPreparo', 300);
			$table->string('observacao', 300)->nullable();
			$table->string('fotos', 100);
			$table->integer('usuarios_id')->index('fk_receitas_usuarios1_idx');
			$table->primary(['id','usuarios_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('receitas');
	}

}
