<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Jcgm;
use App\Models\Palestra;

class Palestras extends Controller
{
    public $primeiraGrelha = false;

    //Manipular conteudo da base de dados
    public function index()
    {
        //   $palestras = Palestra::all();

        $palestras = Palestra::where('jcgm_id', Jcgm::where(['selecionado' => 1])->first()->id)->get();
        //dd($palestras);
        return view("homePage/palestras", ['palestras' => $palestras]);
    }

    public function primeiraGrelha()
    {
        if ($this->primeiraGrelha) {$this->primeiraGrelha = false;} else { $this->primeiraGrelha = true;}
    }
}
