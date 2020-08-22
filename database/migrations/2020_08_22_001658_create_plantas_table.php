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
			$table->string('caracteristicas', 800)->nullable();
			$table->string('tamanho', 500);
			$table->string('fruto', 800)->nullable();
			$table->string('folha', 800);
			$table->string('familia', 45);
			$table->string('genero', 45);
			$table->string('especie', 45);
			$table->string('propriedadesMedicinais', 800);
			$table->string('propriedadesCulinarias', 800);
			$table->string('avisos', 800)->nullable();
			$table->string('cultivo', 800)->nullable();
			$table->string('fotos', 300);
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
