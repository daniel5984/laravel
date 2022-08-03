<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFicheirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficheiros', function (Blueprint $table) {
            $table->id();
            $table->string('nome_ficheiro')->nullable();
            $table->foreignId('jcgm_id')->nullable()->constrained(); //Chave estrangeira
            $table->string('tipo_ficheiro');
            $table->string('categoria');
            $table->string('tamanho')->nullable();;
            $table->string('link_principal');
            $table->string('link_adicional')->nullable();
            $table->text('desc')->nullable();
            $table->text('filePath')->nullable();
            $table->text('modeloPath')->nullable();

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
        Schema::dropIfExists('ficheiros');
    }
}
