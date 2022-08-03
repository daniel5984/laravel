<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Cartaz;
use App\Models\Jcgm;

class Cartazs extends Controller
{
    //

    public function index()
    {
        $cartaz = Cartaz::where('jcgm_id', Jcgm::where(['selecionado' => 1])->first()->id)->get();

        return view("homePage/cartaz", ['cartaz' => $cartaz]);
    }

}
