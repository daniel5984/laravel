<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Ficheiro;
use App\Models\Jcgm;
use App\Models\ProjetosAluno;
use App\Models\Workshop;
use DB;

class Conteudos extends Controller
{

    public $jornada;
    //
    public function index()
    {
        //$conteudos = Ficheiro::all();
        $workshops = Workshop::all();
        $projetosAlunos = ProjetosAluno::all();

        //$count = Ficheiro::count();

        return view("homePage/conteudos", ['workshops' => $workshops], ['projetosAlunos' => $projetosAlunos]);
    }

    public function mudarJornadas($id)
    {
        $conteudos = Ficheiro::all();
        $count = Ficheiro::count();

        //Zerar
        DB::table('jcgms')->update(['selecionado' => 0]);
        //Encontrar a edição das jornadas com este $id
        $selecionado = Jcgm::find($id);
        $selecionado['selecionado'] = 1;
        $selecionado->save();

        //  return view('/', ['conteudos' => $conteudos, 'count' => $count]);
        return back();

    }

    public function information()
    {
        $conteudos = Jcgm::where((['selecionado' => 1]))->first();

        return view("homePage/informations", ['conteudos' => $conteudos]);
        // return back();

    }

}
