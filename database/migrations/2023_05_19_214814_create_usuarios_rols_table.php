<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuariosRolsTable extends Migration {

	public function up()
	{
		Schema::create('usuarios_rols', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('rol', 255);
		});
	}

	public function down()
	{
		Schema::drop('usuarios_rols');
	}
}