<?php

namespace Database\Seeders;

use App\Models\Ficheiro;
use App\Models\ProjetosAluno;
use Illuminate\Database\Seeder;

class ProjetosAlunosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projFicheiro = new Ficheiro();
        $projFicheiro->nome_ficheiro = "Projeto BRTEC";
        $projFicheiro->jcgm_id = null;
        $projFicheiro->tipo_ficheiro = "Imagem"; //Imagem,Video,3D
        $projFicheiro->categoria = 'ProjetosAlunos'; //Conteudo,Cartaz,Workshop,Palestra,TrabAlunos,Info
        $projFicheiro->tamanho = "-";
        $projFicheiro->link_principal = "http://jcgm.estg.ipvc.pt/assets/img/portfolio/brtec/imagem.png";
        $projFicheiro->filePath = null;
        $projFicheiro->link_adicional = null;
        $projFicheiro->desc = null; //"Este é o Cartaz das jornadas 2022";
        $projFicheiro->save();

        $proj = new ProjetosAluno();
        //$workshop->jcgm_id = Jcgm::where(['selecionado' => 1])->first()->id; //Campo obrigatório
        $proj->ficheiro_id = $projFicheiro->id;
        $proj->nomes_alunos = "Luís, Hugo, Daniel";
        $proj->ano = "2021";
        $proj->link_video = "http://jcgm.estg.ipvc.pt/assets/img/portfolio/brtec/video.mp4
";
        $proj->local_video = null; //Caso queira Carregar o video
        $proj->nome_disciplina = null; ///Nome da disciplica em que o trabalho foi realizado
        $proj->categoria = 'Web'; //Programação Web, Modelação 3D ,Unity 3D
        $proj->obs = null;
        $proj->imagemVideo = "Video";

        $proj->save();

        $projFicheiro2 = new Ficheiro();
        $projFicheiro2->nome_ficheiro = "Projeto Corrida";
        $projFicheiro2->jcgm_id = null;
        $projFicheiro2->tipo_ficheiro = "Imagem"; //Imagem,Video,3D
        $projFicheiro2->categoria = 'ProjetosAlunos'; //Conteudo,Cartaz,Workshop,Palestra,TrabAlunos,Info
        $projFicheiro2->tamanho = "-";
        $projFicheiro2->link_principal = "http://jcgm.estg.ipvc.pt/assets/img/portfolio/corrida/corrida.png
";
        $projFicheiro2->filePath = null;
        $projFicheiro2->link_adicional = null;
        $projFicheiro2->desc = null; //"Este é o Cartaz das jornadas 2022";
        $projFicheiro2->save();

        $proj2 = new ProjetosAluno();
//$workshop->jcgm_id = Jcgm::where(['selecionado' => 1])->first()->id; //Campo obrigatório
        $proj2->ficheiro_id = $projFicheiro2->id;

        $proj2->nomes_alunos = "Luís Cerqueira, Marco Fonte";
        $proj2->ano = "2020";
        $proj2->link_video = "http://jcgm.estg.ipvc.pt/assets/img/portfolio/corrida/corrida.mp4
";
        $proj2->local_video = null; //Caso queira Carregar o video
        $proj2->nome_disciplina = null; ///Nome da disciplica em que o trabalho foi realizado
        $proj2->categoria = 'Unity 3D'; //Programação Web, Modelação 3D ,Unity 3D
        $proj2->obs = null;
        $proj2->imagemVideo = "Video"; //Video / ImagemSaber se só tem image ou tb tem video
        $proj2->save();

//Imagem

        $projFicheiro2 = new Ficheiro();
        $projFicheiro2->nome_ficheiro = "Quarto de hotel";
        $projFicheiro2->jcgm_id = null;
        $projFicheiro2->tipo_ficheiro = "Imagem"; //Imagem,Video,3D
        $projFicheiro2->categoria = 'ProjetosAlunos'; //Conteudo,Cartaz,Workshop,Palestra,TrabAlunos,Info
        $projFicheiro2->tamanho = "-";
        $projFicheiro2->link_principal = "http://jcgm.estg.ipvc.pt/assets/img/portfolio/modelacao/ValerieDuarte/render_2_cc.jpg

";
        $projFicheiro2->filePath = null;
        $projFicheiro2->link_adicional = null;
        $projFicheiro2->desc = null; //"Este é o Cartaz das jornadas 2022";
        $projFicheiro2->save();

        $proj2 = new ProjetosAluno();
//$workshop->jcgm_id = Jcgm::where(['selecionado' => 1])->first()->id; //Campo obrigatório
        $proj2->ficheiro_id = $projFicheiro2->id;

        $proj2->nomes_alunos = "Valérie Duarte";
        $proj2->ano = "2020";
        $proj2->link_video = null;
        $proj2->local_video = null; //Caso queira Carregar o video
        $proj2->nome_disciplina = null; ///Nome da disciplica em que o trabalho foi realizado
        $proj2->categoria = 'Modelação 3D'; //Programação Web, Modelação 3D ,Unity 3D
        $proj2->obs = null;
        $proj2->imagemVideo = "Imagem"; //Video / ImagemSaber se só tem image ou tb tem video
        $proj2->save();

    }
}
