<?php

namespace Database\Seeders;

use App\Models\Ficheiro;
use App\Models\Jcgm;
use App\Models\Workshop;
use Illuminate\Database\Seeder;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workshopFicheiro = new Ficheiro();
        $workshopFicheiro->nome_ficheiro = "Logo Html";
        $workshopFicheiro->jcgm_id = Jcgm::where(['selecionado' => 1])->first()->id;
        $workshopFicheiro->tipo_ficheiro = "Imagem"; //Imagem,Video,3D
        $workshopFicheiro->categoria = 'Workshop'; //Conteudo,Cartaz,Workshop,Palestra,TrabAlunos,Info
        $workshopFicheiro->tamanho = "-";
        $workshopFicheiro->link_principal = "https://cdn.discordapp.com/attachments/912373353971593267/1001405644521361549/1051277.png
";
        $workshopFicheiro->filePath = null;
        $workshopFicheiro->link_adicional = null;
        $workshopFicheiro->desc = null; //"Este é o Cartaz das jornadas 2022";
        $workshopFicheiro->save();

        $workshop = new Workshop();
        $workshop->jcgm_id = Jcgm::where(['selecionado' => 1])->first()->id; //Campo obrigatório
        $workshop->ficheiro_id = Ficheiro::where(['categoria' => 'Workshop'])->latest('created_at')->first()->id; //Campo obrigatório
        $workshop->nome_workshop = "Html 5";
        $workshop->tipo_workshop = "Html"; //Html,Illustrator,Blender,Unity 3D
        $workshop->nomes_alunos = "Daniel,João";
        $workshop->desc = "O HTML é uma linguagem de marcação utilizada na construção de páginas na Web e a sua tecnologia é fruto da junção dos padrões HyTime e SGML.";
        $workshop->guiao = "http://jcgm.estg.ipvc.pt/assets/guioes/jcgm_workshop-HTML5.pdf"; //Pode Ser Nulo, se não houver guião
        $workshop->obs = null;
        $workshop->save();

    }
}
