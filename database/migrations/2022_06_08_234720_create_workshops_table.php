<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();

            $table->foreignId('jcgm_id')->constrained(); //Chave estrangeira
            $table->foreignId('ficheiro_id')->constrained(); //Chave estrangeira

            $table->string('nome_workshop');
            $table->string('tipo_workshop');
            $table->string('nomes_alunos');

            $table->string('guiao');

            $table->text('desc');
            $table->text('obs')->nullable();
      

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
        Schema::dropIfExists('workshops');
    }
}
