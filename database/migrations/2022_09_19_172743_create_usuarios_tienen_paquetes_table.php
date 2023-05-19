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
        Schema::create('usuarios_tienen_paquetes', function (Blueprint $table) {

            $table->foreignId('usuario_id')->constrained('usuarios', 'usuario_id');
            $table->unsignedTinyInteger('paquete_id');
            $table->foreign('paquete_id')->references('paquete_id')->on('paquetes');
            $table->primary(['usuario_id', 'paquete_id']);
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
        Schema::dropIfExists('usuarios_tienen_paquetes');
    }
};
