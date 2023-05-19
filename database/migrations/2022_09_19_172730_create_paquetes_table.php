<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes', function (Blueprint $table) {
            $table->tinyIncrements('paquete_id');
            $table->string('nombre');
            $table->unsignedInteger('duracion');
            $table->string('portada', 255);
            $table->string('portada_perfil', 255);
            $table->unsignedInteger('precio');
            $table->string('descripcion_paquete', 60);
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
        Schema::dropIfExists('paquetes');
    }
};
