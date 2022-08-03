<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Jcgm;

class HomePage extends Controller
{
    //
    public function index()
    {

        $Jcgm = Jcgm::all();

/*         $nome = "Daniel";
$idade = 22;
$arr = [1, 2, 3, 4, 5];
return view('welcome', [
'nome' => $nome,
'idade' => $idade,
'arr' => $arr,
]); */

        return view('homePage.index', ['jcgm' => $Jcgm]);
    }
}
