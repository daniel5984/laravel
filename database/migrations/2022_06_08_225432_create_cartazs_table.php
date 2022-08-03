<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartazsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartazs', function (Blueprint $table) {
            $table->id();
            $table->string('nome_aluno');
            $table->integer('numero_aluno');
            $table->foreignId('jcgm_id')->constrained(); //Chave estrangeira
            $table->foreignId('ficheiro_id')->constrained(); //Chave estrangeira
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
        Schema::dropIfExists('cartazs');
    }
}
