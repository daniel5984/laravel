<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\ProjetosAluno;

class ProjetosAlunos extends Controller
{
    public function index()
    {
        $projetosAlunos = ProjetosAluno::all();

        return view("homePage/projetosAlunos", ['projetosAlunos' => $projetosAlunos]);
    }

    public function modelacao()
    {
        $projetosAlunos = ProjetosAluno::where('categoria', 'Modelação 3D')->get();

        return view("homePage/projetosAlunos", ['projetosAlunos' => $projetosAlunos]);

    }
    public function web()
    {
        $projetosAlunos = ProjetosAluno::where('categoria', 'Web')->get();
        //dd($projetosAlunos);

        return view("homePage/projetosAlunos", ['projetosAlunos' => $projetosAlunos]);

    }
    public function unity()
    {
        $projetosAlunos = ProjetosAluno::where('categoria', 'Unity 3D')->get();

        return view("homePage/projetosAlunos", ['projetosAlunos' => $projetosAlunos]);

    }
}
