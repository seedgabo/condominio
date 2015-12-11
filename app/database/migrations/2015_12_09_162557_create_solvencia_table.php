<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSolvenciaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solvencia', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('residencia_id');
			$table->integer("mes");
			$table->integer("año");
			$table->float("monto");
			$table->timestamp("facturado_el");
			$table->timestamp("cancelado_el");
			$table->integer("estado");   // 0 => Moroso , 1 => AlDía, 2 => Crédito
			$table->string("descripcion",50)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('solvencia');
	}

}