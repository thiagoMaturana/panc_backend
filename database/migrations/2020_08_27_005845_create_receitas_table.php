
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


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
			$table->id();
			$table->foreignId('usuarios_id');
			$table->string('nome');
			$table->string('tipo');
			$table->string('porcoes', 100);
			$table->text('modoPreparo');
			$table->string('tempoPreparo', 60);
			$table->text('observacao')->nullable();
			$table->text('fotos');

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
		Schema::drop('receitas');
	}

}
