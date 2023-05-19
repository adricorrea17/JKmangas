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
        Schema::create('generos_mangas', function (Blueprint $table) {
            $table->foreignId('manga_id')->constrained('mangas', 'manga_id');
            $table->unsignedTinyInteger('genero_id');
            $table->foreign('genero_id')->references('genero_id')->on('generos');
            $table->primary(['manga_id', 'genero_id']);
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
        Schema::dropIfExists('generos_mangas');
    }
};
