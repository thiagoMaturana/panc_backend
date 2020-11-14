<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomesPopularesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nomes_populares', function(Blueprint $table)
		{
			$table->id();
			$table->foreignId('plantas_id');
			$table->string('nome', 60);

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
		Schema::drop('nomes_populares');
	}

}
