<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosPlansTable extends Migration {

	public function up()
	{
		Schema::create('usuarios_plans', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre', 255);
			$table->string('imagen', 255)->nullable();
			$table->decimal('precio', 8,2)->default('0');
			$table->text('descripcion')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('usuarios_plans');
	}
}