<?php

namespace App\Http\Livewire;

use App\Models\Ficheiro;
use App\Models\ProjetosAluno;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Projetos extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $active;
    public $pesquisa;

    public $confirmingProjetoAdd = false;
    public $confirmingProjetoDeletion = false;

    public $tipo3D = false;
    public $tipoImagem = false;
    public $tipoVideo = false;

    //Todos os parámetros neste array
    public $projeto;
    public $ficheiro;

    public $ficheiroImagem; //Ficheiro para a Imagem
    public $modelo3d; //Ficheiro para o Modelo

    public $storeimg;

    //a pesquisa e o filtro estão presentes no url quando são utilizados
    protected $queryStrings = ["active" => ['except' => false], "pesquisa" => ['except' => false]];
    protected $rules = [

        'projeto.nomes_alunos' => 'string',
        'ficheiro.nome_ficheiro' => 'string',
        'projeto.categoria' => 'string',
        'projeto.obs' => 'string',
        'projeto.ano' => 'integer',
        'ficheiro.nome_ficheiro' => 'string',
        'projeto.link_video' => '',
        'ficheiro.link_principal' => '',
        'ficheiroImagem' => '',

    ];
    public function render()
    {
        $projetos = ProjetosAluno::paginate(6);

        return view('livewire.projetos', ['projetos' => $projetos]);
    }
    //Dar update na pagina quando se clica em mostrar todos os workshops
    public function updatingActive()
    {
        $this->resetPage();
    }

    public function updatingPesquisa()
    {
        $this->resetPage();
    }

    //Pop up de Confirmação para Adicionar
    public function confirmProjetoAdd()
    {
        $this->reset(['projeto']);
        $this->reset(['ficheiro']);
        $this->reset(['ficheiroImagem']);
        $this->reset(['storeimg']);
        $this->reset(['modelo3d']);

        $this->confirmingProjetoAdd = true;

    }
    //Pop up de Confirmação para Editar
    public function confirmProjetoEdit(ProjetosAluno $projeto)
    {
        $this->projeto = $projeto;
        $this->ficheiro = Ficheiro::find($projeto->ficheiro_id);
        //dd(isset($this->ficheiro->filePath));

        // if (isset($this->ficheiro->filePath)) {
        //     //$this->storeimg = $this->ficheiro->filePath;
        //     $this->storeimg = $this->ficheiro->filePath;
        // }

        //dd($this->ficheiro);
        $this->confirmingProjetoAdd = true;

        //Pop up de Confirmação para remover
    }
    public function confirmingProjetoDeletion($id)
    {
        $this->confirmingProjetoDeletion = $id;

    }

    //Remover Workshop
    public function deleteProjeto(ProjetosAluno $id)
    {

        $id->delete();
        $this->ficheiro = Ficheiro::find($id->ficheiro_id);
        $this->ficheiro->delete();

        $this->confirmingProjetoDeletion = false;
    }

    public function addProjeto()
    {

        $this->validate();

        if ($this->tipo3D) {
            $tipoFicheiro = '3D';

        } elseif ($this->tipoVideo) {
            $tipoFicheiro = 'Video';
        } elseif ($this->tipoImagem) {
            $tipoFicheiro = 'Imagem';
        } else {
            $tipoFicheiro = 'Imagem';

        }

        $image = null;
        $ficheiro3D = null;

        //Imagem Preview
        if ($this->ficheiroImagem) {
            $image = $this->ficheiroImagem->store('public/assets/projetos');
        }

        //Ficheiro 3D
        if ($this->modelo3d) {
            $ficheiro3D = $this->modelo3d->store('public/assets/Modelo3D');

        }

        //Editar
        if (isset($this->projeto->id)) {
            if ($image) {
                $this->ficheiro['filePath'] = $image;

            }
            if ($ficheiro3D) {
                $this->ficheiro['modeloPath'] = $ficheiro3D;
            }

            $this->projeto['imagemVideo'] = $tipoFicheiro;

            $this->ficheiro->save();

            $this->projeto->save();

        } else { //Adicionar
            //   dd($this->workshop);
            //dd($this->image->getClientOriginalName());

            //Cria dados do ficheiro e associa o id à tabela dos Workshops
            $myficheiro = Ficheiro::create([
                'nome_ficheiro' => $this->ficheiro['nome_ficheiro'] ?? 'default',
                'tipo_ficheiro' => $tipoFicheiro ?? 'Image',
                'tamanho' => $this->ficheiro['tamanho'] ?? '-',
                'filePath' => $image ?? null,
                'categoria' => 'ProjetosAlunos',
                'link_principal' => $this->ficheiro['link_principal'] ?? '-',
                'link_adicional' => $this->ficheiro['link_adicional'] ?? null,
                'modeloPath' => $ficheiro3D ?? null,
                'desc' => $this->ficheiro['desc'] ?? '-',
                'jcgm_id' => null,
            ]);
            $myficheiro['modeloPath'] = $ficheiro3D;
            $myficheiro->save();

            ProjetosAluno::create([
                'ficheiro_id' => $myficheiro->id ?? '-',
                'nomes_alunos' => $this->projeto['nomes_alunos'] ?? '-',
                'ano' => $this->projeto['ano'] ?? '-',
                'obs' => $this->projeto['obs'] ?? null,
                'categoria' => $this->projeto['categoria'] ?? 'Web',

                'link_video' => $this->projeto['link_video'] ?? null,
                'nome_disciplina' => $this->projeto['nome_disciplina'] ?? null,
                'imagemVideo' => $tipoFicheiro ?? null,

            ]);
        }
        $this->reset(['ficheiroImagem']);
        $this->reset(['storeimg']);

        $this->reset(['projeto']);

        $this->reset(['modelo3d']);

        $this->confirmingProjetoAdd = false;

    }

    public function tipoImagem()
    {
        $this->tipo3D = false;
        $this->tipoImagem = true;
        $this->tipoVideo = false;

    }
    public function tipoVideo()
    {
        $this->tipo3D = false;
        $this->tipoImagem = false;
        $this->tipoVideo = true;

    }
    public function tipo3D()
    {
        $this->tipo3D = true;
        $this->tipoImagem = false;
        $this->tipoVideo = false;

    }
}
