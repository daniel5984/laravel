<?php

namespace Database\Seeders;

use App\Models\Cartaz;
use App\Models\Ficheiro;
use App\Models\Jcgm;
use Illuminate\Database\Seeder;

class CartazSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cartaz = new Cartaz();
        $cartaz->nome_aluno = "Daniel Alexandre";
        $cartaz->numero_aluno = 20786;
        $cartaz->jcgm_id = Jcgm::where(['selecionado' => 1])->first()->id;
        $cartaz->ficheiro_id = Ficheiro::where(['categoria' => 'Cartaz'])->first()->id;
        $cartaz->save();

    }
}
