<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetosAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos_alunos', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('jcgm_id')->constrained(); Os trabalhos dos anos anteriores não precisam ser relacionados com as jornadas
            $table->string('nomes_alunos');
            $table->foreignId('ficheiro_id')->constrained(); //Para fazer upload de imagem
            //$table->string("site"); //
            $table->integer("ano")->nullable(); //O ano em que o trabalho foi realizado
            $table->string('link_video')->nullable(); //Video do youtube
            $table->string('local_video')->nullable(); //Caso queira Carregar o video
            $table->string("nome_disciplina")->nullable(); //Nome da disciplica em que o trabalho foi realizado
            $table->string("categoria"); //Programação Web, Modelação 3D ,Unity 3D
            $table->text("obs")->nullable();
            $table->timestamps();
            $table->string("imagemVideo"); //Para saber se só tem imagem tb tem video

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projetos_alunos');
    }
}
