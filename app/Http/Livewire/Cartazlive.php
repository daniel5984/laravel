<?php

namespace App\Http\Livewire;

use App\Models\Cartaz;
use App\Models\Ficheiro;
use App\Models\Jcgm;
use App\Models\Workshop;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Cartazlive extends Component
{
    use WithPagination;
    use WithFileUploads;
    use WithPagination;

    public $active;
    public $pesquisa;

    public $confirmingCartazAdd = false;
    public $confirmingCartazDeletion = false;

    //Todos os parámetros neste array
    public $cartaz;
    public $ficheiro;

    //Imagens
    public $image;
    public $storeimg;

    //a pesquisa e o filtro estão presentes no url quando são utilizados
    protected $queryStrings = ["active" => ['except' => false], "pesquisa" => ['except' => false]];
    protected $rules = [
        'cartaz.nome_aluno' => 'required|string',
        'cartaz.numero_aluno' => 'required|integer',

        'ficheiro.nome_ficheiro' => 'string',
        'ficheiro.tipo_ficheiro' => 'string',
        'ficheiro.link_principal' => '',
        'image' => 'image|max:1024',

    ];

    public function render()
    {

        $cartazes = Cartaz::when(!$this->active, function ($query) {
            return $query->where('jcgm_id', Jcgm::where(['selecionado' => 1])->first()->id);

            //Adicionar pesquisa
        })->when($this->pesquisa, function ($query) {
            return $query->where(function ($query) {
                $query->where('nome_aluno', 'like', '%' . $this->pesquisa . '%');
                $query->orWhere('numero_aluno', 'like', '%' . $this->pesquisa . '%');

            });

        });
//$debugQuery = $cartazes->toSql();
        $cartazes = $cartazes->paginate(5);

        return view('livewire.cartazlive', ['cartazes' => $cartazes]);
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
    public function confirmCartazAdd()
    {
        $this->reset(['cartaz']);
        $this->reset(['ficheiro']);
        $this->reset(['image']);
        $this->reset(['storeimg']);

        $this->confirmingCartazAdd = true;

    }
    //Pop up de Confirmação para Editar
    public function confirmCartazEdit(Cartaz $workshop)
    {
        $this->workshop = $workshop;
        $this->ficheiro = Ficheiro::find($workshop->ficheiro_id);
        //dd(isset($this->ficheiro->filePath));

        if (isset($this->ficheiro->filePath)) {
            //$this->storeimg = $this->ficheiro->filePath;
            $this->storeimg = $this->ficheiro->filePath;
        }

        //dd($this->ficheiro);
        $this->confirmingCartazAdd = true;

        //Pop up de Confirmação para remover
    }
    public function confirmingCartazDeletion($id)
    {
        $this->confirmingCartazDeletion = $id;

    }

    //Remover Workshop
    public function deleteCartaz(Cartaz $id)
    {

        $id->delete();
        $this->ficheiro = Ficheiro::find($id->ficheiro_id);
        $this->ficheiro->delete();

        $this->confirmingCartazDeletion = false;
    }

    public function addCartaz()
    {
        //dd($this->image);
        //  dd($this->workshop);

        $this->validate();

        $image = $this->image->store('public/assets/Cartaz');

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

            Cartaz::create([
                'nome_aluno' => $this->cartaz['nome_aluno'] ?? '-',
                'numero_aluno' => $this->cartaz['numero_aluno'] ?? '-',

                'jcgm_id' => Jcgm::where(['selecionado' => 1])->first()->id,
                'ficheiro_id' => $myficheiro->id ?? '-',
            ]);

        }
        $this->reset(['image']);
        $this->reset(['storeimg']);

        $this->confirmingCartazAdd = false;

    }

}
