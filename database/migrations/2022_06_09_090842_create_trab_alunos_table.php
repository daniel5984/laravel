<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trab_alunos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jcgm_id')->constrained(); //Chave estrangeira

            $table->string('nomes_alunos');
            $table->timestamps();
            $table->string("projeto");
            $table->string("site");
            $table->integer("ano");
            $table->string("nome_disciplina");
            $table->string("categoria");
            $table->text("obs");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trab_alunos');
    }
}
