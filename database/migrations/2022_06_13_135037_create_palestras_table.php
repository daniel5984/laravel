<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePalestrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palestras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jcgm_id')->constrained(); //Chave estrangeira
            $table->foreignId('ficheiro_id')->nullable()->constrained();

            $table->string('titulo');
            $table->string('nome_orador');
            $table->string('site')->nullable();
            $table->string('desc')->nullable();

            $table->string('data');
            $table->string('hora');

            $table->integer('numero_telefone')->nullable();
            $table->string('morada')->nullable();
            $table->boolean('status')->nullable();

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
        Schema::dropIfExists('palestras');
    }
}
