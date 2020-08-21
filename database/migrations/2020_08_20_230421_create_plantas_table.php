<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlantasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plantas', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nome', 45);
			$table->string('nomeCientifico', 45);
			$table->string('caracteristicas', 200)->nullable();
			$table->string('tamanho', 100);
			$table->string('fruto', 100);
			$table->string('folha', 100);
			$table->string('familia', 45);
			$table->string('genero', 45);
			$table->string('especie', 45);
			$table->string('propriedadesMedicinais', 200);
			$table->string('propriedadesCulinarias', 200);
			$table->string('avisos', 45)->nullable();
			$table->string('cultivo', 200)->nullable();
			$table->string('fotos', 100);
			$table->integer('usuarios_id')->index('fk_plantas_usuarios1_idx');
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
		Schema::drop('plantas');
	}

}
