<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Jcgm;
use App\Models\Workshop;

class Workshops extends Controller
{
    //Este conteúdo pode ser acessado pelo blade na view dos workshops e usar foreach

    public function index()
    {
        //$workshops = Workshop::all();
        $workshops = Workshop::where('jcgm_id', Jcgm::where(['selecionado' => 1])->first()->id)->get();
        //dd($workshops);
        return view("homePage/workshops", ['workshops' => $workshops]);

    }
}
