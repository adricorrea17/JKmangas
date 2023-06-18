<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration
{

	public function up()
	{
		Schema::table('usuarios', function (Blueprint $table) {
			$table->foreign('usuarios_plan_id')->references('id')->on('usuarios_plans')
				->onDelete('set null')
				->onUpdate('no action');
		});
		Schema::table('usuarios', function (Blueprint $table) {
			$table->foreign('usuarios_rol_id')->references('id')->on('usuarios_rols')
				->onDelete('set null')
				->onUpdate('no action');
		});
		Schema::table('usuarios_pagos', function (Blueprint $table) {
			$table->foreign('plan_id')->references('id')->on('usuarios_plans')
				->onDelete('no action')
				->onUpdate('no action');
		});
		Schema::table('usuarios_pagos', function (Blueprint $table) {
			$table->foreign('usuario_id')->references('id')->on('usuarios')
				->onDelete('no action')
				->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('usuarios', function (Blueprint $table) {
			$table->dropForeign('usuarios_usuarios_plan_id_foreign');
		});
		Schema::table('usuarios', function (Blueprint $table) {
			$table->dropForeign('usuarios_usuarios_rol_id_foreign');
		});
		Schema::table('usuarios_pagos', function (Blueprint $table) {
			$table->dropForeign('usuarios_pagos_plan_id_foreign');
		});
		Schema::table('usuarios_pagos', function (Blueprint $table) {
			$table->dropForeign('usuarios_pagos_usuario_id_foreign');
		});
	}
}
