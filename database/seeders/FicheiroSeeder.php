<?php

namespace Database\Seeders;

use App\Models\Ficheiro;
use App\Models\Jcgm;
use Illuminate\Database\Seeder;

class FicheiroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ficheiro = new Ficheiro();
        $ficheiro->nome_ficheiro = "Cartaz";
        $ficheiro->jcgm_id = Jcgm::where(['selecionado' => 1])->first()->id;
        $ficheiro->tipo_ficheiro = "Imagem"; //Imagem,Video,3D
        $ficheiro->categoria = 'Cartaz'; //Conteudo,Cartaz,Workshop,Palestra,TrabAlunos,Info
        $ficheiro->tamanho = "-";
        $ficheiro->filePath = null;
        $ficheiro->link_principal = "https://www.ipvc.pt/estg/wp-content/uploads/sites/3/2022/04/ESTG_Cartaz-XX-JCGM.jpg
";
        $ficheiro->link_adicional = null;
        $ficheiro->desc = null; //"Este é o Cartaz das jornadas 2022";

        $ficheiro->save();
    }
}
