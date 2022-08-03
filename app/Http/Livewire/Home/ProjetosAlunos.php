<?php

namespace App\Http\Livewire\Home;

use App\Models\ProjetosAluno;
use Livewire\Component;

class ProjetosAlunos extends Component
{
    public function render()
    {
        $projetosAlunos = ProjetosAluno::all();

        return view("homePage/projetosAlunos", ['projetosAlunos' => $projetosAlunos]);

    }
    public function test()
    {
        dd(true);

    }
}
