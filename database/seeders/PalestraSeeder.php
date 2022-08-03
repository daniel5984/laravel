<?php

namespace Database\Seeders;

use App\Models\Jcgm;
use App\Models\Palestra;
use Illuminate\Database\Seeder;

class PalestraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $palestra = new Palestra();
        $palestra->jcgm_id = Jcgm::where(['selecionado' => 1])->first()->id;
        $palestra->ficheiro_id = null;
        $palestra->titulo = "Sessão Abertura";
        $palestra->nome_orador = "Presidente do IPVC - Carlos Rodrigues";
        $palestra->site = null;
        $palestra->desc = null;
        $palestra->data = "27 abril 2022";
        $palestra->hora = "09h45";
        $palestra->numero_telefone = null;
        $palestra->morada = null;
        $palestra->status = null;
        $palestra->dia = "primeiroDia";
        $palestra->save();

        $palestra = new Palestra();
        $palestra->jcgm_id = Jcgm::where(['selecionado' => 1])->first()->id;
        $palestra->ficheiro_id = null;
        $palestra->titulo = "BitCoin - How Proof-Of-Work Works";
        $palestra->nome_orador = "CPDS - Abel Dantas";
        $palestra->site = null;
        $palestra->desc = null;
        $palestra->data = "27 abril 2022";
        $palestra->hora = "10h00";
        $palestra->numero_telefone = null;
        $palestra->morada = null;
        $palestra->status = null;
        $palestra->dia = "primeiroDia";
        $palestra->save();

        //Segundo Dia
        $palestra = new Palestra();
        $palestra->jcgm_id = Jcgm::where(['selecionado' => 1])->first()->id;
        $palestra->ficheiro_id = null;
        $palestra->titulo = "Virtual Sign Language Interpreter";
        $palestra->nome_orador = "IVLinG Project - Vasco Alves";
        $palestra->site = null;
        $palestra->desc = null;
        $palestra->data = "28 abril 2022";
        $palestra->hora = "10h00";
        $palestra->numero_telefone = null;
        $palestra->morada = null;
        $palestra->status = null;
        $palestra->dia = "segundoDia";
        $palestra->save();

    }
}
