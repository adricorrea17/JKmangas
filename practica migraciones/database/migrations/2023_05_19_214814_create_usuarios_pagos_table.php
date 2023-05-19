<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosPagosTable extends Migration {

	public function up()
	{
		Schema::create('usuarios_pagos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->decimal('monto', 8,2)->default('0');
			$table->string('mp_validacion', 255)->nullable();
			$table->integer('plan_id')->unsigned();
			$table->integer('usuario_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('usuarios_pagos');
	}
}