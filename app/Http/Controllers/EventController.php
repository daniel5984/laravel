<?php

namespace App\Http\Controllers;

class EventController extends Controller
{
    //
    public function index()
    {
        $nome = "Daniel";
        $idade = 22;
        $arr = [1, 2, 3, 4, 5];
        return view('welcome', [
            'nome' => $nome,
            'idade' => $idade,
            'arr' => $arr,
        ]);

        return view('paginaInical.first');

    }
}
