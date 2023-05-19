<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosTable extends Migration {

	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre_usuario', 255)->unique();
			$table->string('password', 255);
			$table->string('email', 255);
			$table->string('imagen', 255)->nullable();
			$table->integer('usuarios_plan_id')->unsigned()->nullable();
			$table->integer('usuarios_rol_id')->unsigned()->nullable();
			$table->datetime('fecha_cierre')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('usuarios');
	}
}