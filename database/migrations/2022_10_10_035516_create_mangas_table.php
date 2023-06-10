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
        Schema::create('mangas', function (Blueprint $table) {
            $table->increments('manga_id');
            $table->string('titulo', 60);
            $table->unsignedInteger('precio');
            $table->text('descripcion');
            $table->string('portada', 255)->nullable();
            $table->string('mangaka', 60);
            $table->unsignedInteger('tomos');
            $table->date('proximo_tomo');
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
        Schema::dropIfExists('mangas');
    }
};
