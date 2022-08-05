<?php

namespace App\Http\Livewire;

use App\Models\Ficheiro;
use App\Models\Jcgm;
use App\Models\Workshop;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Workshops extends Component
{
    use WithPagination;
    use WithFileUploads;
    use WithPagination;

    public $active;
    public $pesquisa;

    public $confirmingWorkshopAdd = false;
    public $confirmingWorkshopDeletion = false;

    //Todos os parámetros neste array
    public $workshop;
    public $ficheiro;

    public $image;
    public $storeimg;

    //a pesquisa e o filtro estão presentes no url quando são utilizados
    protected $queryStrings = ["active" => ['except' => false], "pesquisa" => ['except' => false]];
    protected $rules = [
        'workshop.nome_workshop' => 'required|string',
        'workshop.nomes_alunos' => 'string',
        'workshop.tipo_workshop' => 'string',
        'workshop.desc' => 'string',
        'workshop.obs' => '',
        'workshop.guiao' => '',
        'ficheiro.nome_ficheiro' => 'string',
        'ficheiro.tipo_ficheiro' => 'string',
        'ficheiro.link_principal' => '',
        'image' => 'image|max:1024',

    ];
    public function render()
    {
        $workshops = Workshop::
            where('jcgm_id', Jcgm::where(['selecionado' => 1])->first()->id); //->get();

        $workshops = $workshops->paginate(5);

//::paginate(6);

        return view('livewire.workshops', ['workshops' => $workshops]);
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
    public function confirmWorkshopAdd()
    {
        $this->reset(['workshop']);
        $this->reset(['ficheiro']);
        $this->reset(['image']);
        $this->reset(['storeimg']);

        $this->confirmingWorkshopAdd = true;

    }
    //Pop up de Confirmação para Editar
    public function confirmWorkshopEdit(Workshop $workshop)
    {
        $this->workshop = $workshop;
        $this->ficheiro = Ficheiro::find($workshop->ficheiro_id);
        //dd(isset($this->ficheiro->filePath));

        if (isset($this->ficheiro->filePath)) {
            //$this->storeimg = $this->ficheiro->filePath;
            $this->storeimg = $this->ficheiro->filePath;
        }

        //dd($this->ficheiro);
        $this->confirmingWorkshopAdd = true;

        //Pop up de Confirmação para remover
    }
    public function confirmingWorkshopDeletion($id)
    {
        $this->confirmingWorkshopDeletion = $id;

    }

    //Remover Workshop
    public function deleteWorkshop(Workshop $id)
    {

        $id->delete();
        $this->ficheiro = Ficheiro::find($id->ficheiro_id);
        $this->ficheiro->delete();

        $this->confirmingWorkshopDeletion = false;
    }

    public function addWorkshop()
    {
        //dd($this->image);
        //  dd($this->workshop);

        $this->validate();

        //$image = $this->image->store('public/assets/workshops');
        $image = $this->image->storeAS('workshop/', $this->image->getClientOriginalName(), 's3');

        //$file = $request->file('avatar');

//$name = $file->getClientOriginalName();

        //dd($this->ficheiro['filePath']);
        //dd($this->image);

        //dd($image);
        if (isset($this->workshop->id)) {
            $this->ficheiro['filePath'] = $image;
            $this->workshop['jcgm_id'] = Jcgm::where(['selecionado' => 1])->first()->id;
            $this->ficheiro->save();

            $this->workshop->save();
        } else {
            //   dd($this->workshop);
            //dd($this->image->getClientOriginalName());

            //Cria dados do ficheiro e associa o id à tabela dos Workshops
            $myficheiro = Ficheiro::create([
                'nome_ficheiro' => $this->image->getClientOriginalName() ?? '-',
                'tipo_ficheiro' => $this->ficheiro['tipo_ficheiro'] ?? 'Imagem',
                'tamanho' => $this->ficheiro['tamanho'] ?? '-',
                'filePath' => $image ?? '-',
                'categoria' => 'Workshop',
                'link_principal' => $this->ficheiro['link_principal'] ?? '-',
                'link_adicional' => $this->ficheiro['link_adicional'] ?? '-',
                'desc' => $this->ficheiro['desc'] ?? '-',
                'jcgm_id' => Jcgm::where(['selecionado' => 1])->first()->id,
            ]);
            $myficheiro->save();

            Workshop::create([
                'nome_workshop' => $this->workshop['nome_workshop'] ?? '-',
                'nomes_alunos' => $this->workshop['nomes_alunos'] ?? '-',
                'tipo_workshop' => $this->workshop['tipo_workshop'] ?? 'Html',
                'guiao' => $this->workshop['guiao'] ?? null,
                'desc' => $this->workshop['desc'] ?? '-',
                'obs' => $this->workshop['obs'] ?? '-',
                'jcgm_id' => Jcgm::where(['selecionado' => 1])->first()->id,
                'ficheiro_id' => $myficheiro->id ?? '-',
            ]);

        }
        $this->reset(['image']);
        $this->reset(['storeimg']);

        $this->confirmingWorkshopAdd = false;

    }

}
