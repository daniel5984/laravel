<?php

namespace App\Http\Livewire;

use App\Models\Jcgm;
use App\Models\Palestra;
use Livewire\Component;
use Livewire\WithPagination;

class Palestras extends Component
{
    use WithPagination;

    public $active;
    public $pesquisa;
    public $palestra;
    public $confirmingPalestraDeletion = false;
    public $confirmingPalestraAdd = false;

    public $title;
    public $nome_orador;
    public $site;
    public $desc;
    public $data;
    public $hora;
    public $status;

    //a pesquisa e o filtro estão presentes no url quando são utilizados
    protected $queryStrings = ["active" => ['except' => false], "pesquisa" => ['except' => false]];
    protected $rules = [
        'palestra.titulo' => 'required|string',
        'palestra.nome_orador' => 'string',
        'palestra.site' => 'string',
        'palestra.desc' => 'string',
        'palestra.data' => 'required|string',
        'palestra.hora' => 'required|string',
        'palestra.status' => 'boolean',
    ];
    public function render()
    {
        //Todas as palestras no banco de dados
        //Filtrar pelo status
        $palestras = Palestra::when(!$this->active, function ($query) {
            return $query->where('jcgm_id', Jcgm::where(['selecionado' => 1])->first()->id);

            //Adicionar pesquisa
        })->when($this->pesquisa, function ($query) {
            return $query->where(function ($query) {
                $query->where('titulo', 'like', '%' . $this->pesquisa . '%');
                $query->orWhere('nome_orador', 'like', '%' . $this->pesquisa . '%');

            });

        });
        $debugQuery = $palestras->toSql();
        $palestras = $palestras->paginate(5);

        return view('livewire.palestras', ['palestras' => $palestras, 'debugQuery' => $debugQuery]);
    }

    //Dar update na pagina quando se clica em mostrar apenas palestras ativas
    public function updatingActive()
    {
        $this->resetPage();
    }

    public function updatingPesquisa()
    {
        $this->resetPage();
    }

    //Pop up de Confirmação para remover
    public function confirmingPalestraDeletion($id)
    {
        $this->confirmingPalestraDeletion = $id;

    }
    //Remover Palestra
    public function deletePalestra(Palestra $id)
    {
        $id->delete();
        $this->confirmingPalestraDeletion = false;
    }

    //Pop up de Confirmação para Adicionar
    public function confirmPalestraAdd()
    {
        $this->reset(['palestra']);
        $this->confirmingPalestraAdd = true;

    }
    public function confirmPalestraEdit(Palestra $palestra)
    {
        $this->palestra = $palestra;

        $this->confirmingPalestraAdd = true;

    }

    // public function addPalestra()
    // {
    //     $this->validate();
    //     create();
    //     $this->confirmingPalestraAdd = false;

    // }

    public function addPalestra()
    {
        $this->validate();
        if (isset($this->palestra->id)) {
            $this->palestra->save();
        } else {
            Palestra::create([
                'titulo' => $this->palestra['titulo'],
                'jcgm_id' => Jcgm::where(['selecionado' => 1])->first()->id,
                'nome_orador' => $this->palestra['nome_orador'] ?? '-',
                'site' => $this->palestra['site'] ?? '-',
                'desc' => $this->palestra['desc'] ?? '-',
                'data' => $this->palestra['data'],
                'numero_telefone' => 111,
                'morada' => 'none',
                'hora' => $this->palestra['hora'],
                'status' => $this->palestra['status'] ?? 0,
            ]);
            $this->confirmingPalestraAdd = false;
        }
    }

    //A data do modelo mapeada
/*     public function modelData()
{
return [
'titulo' => $this->titulo,
'jcgm_id' => 1,
'nome_orador' => $this->nome_orador,
'site' => $this->site,
'desc' => $this->desc,
'data' => $this->data,
'hora' => $this->hora,
'status' => $this->status];
} */
}
