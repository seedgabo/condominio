<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecibosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recibos', function($tabla)
		{
			$tabla->increments('id');
			$tabla->string('concepto', 50);
			$tabla->decimal("monto",20,3);
			$tabla->biginteger("persona_id");
			$tabla->string("transaccion",50);
			$tabla->string("path",200)->nullable();
			$tabla->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('recibos');
	}

}
