<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
			$table->id();
			$table->foreignId('usuarios_id');
			$table->string('nome', 45)->comment('Nome da planta');
			$table->string('nomeCientifico', 50)->comment('Nome científico da planta');
			$table->text('caracteristicas')->nullable()->comment('Caracteristicas da planta');
			$table->text('tamanho')->comment('Tamanho da planta');
			$table->text('fruto')->nullable()->comment('Fruto da planta');
			$table->text('folha')->comment('Folha da planta');
			$table->string('familia', 45);
			$table->string('genero', 45);
			$table->string('especie', 45);
			$table->text('propriedadesMedicinais')->comment('Propriedades medicinais da planta');
			$table->text('propriedadesCulinarias')->comment('Propriedades culinarias da planta');
			$table->text('avisos')->nullable()->comment('Avisos sobre a planta');
			$table->text('cultivo')->nullable()->comment('Cultivo da planta');
			$table->string('fotos', 200);

			$table->foreign('usuarios_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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