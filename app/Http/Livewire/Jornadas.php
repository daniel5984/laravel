<?php

namespace App\Http\Livewire;

use App\Models\Jcgm;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Jornadas extends Component
{
    use WithPagination;

    public $active;
    public $pesquisa;

    public $confirmingJornadaDeletion = false;
    public $confirmingJornadaAdd = false;

    //Parametros na base de dados
    public $ano;
    public $siteApp;
    public $desc_Ecgm;
    public $desc_Dwm;
    public $desc_NCGM;
    public $selecionado;

    //Todos os parámetros neste array
    public $jornada; //= ["selecionado" => false];

    //Ano Selecionado
    public $Anoselecionado;

    //a pesquisa e o filtro estão presentes no url quando são utilizados
    protected $queryStrings = ["active" => ['except' => false], "pesquisa" => ['except' => false]];
    protected $rules = [
        'jornada.ano' => 'required|int',
        'jornada.siteApp' => 'required|string',
        'jornada.desc_Ecgm' => 'string',
        'jornada.desc_Dwm' => 'string',
        'jornada.desc_NCGM' => 'string',
        'jornada.selecionado' => 'boolean',
    ];
    public function render()
    {
        //$Anoselecionado = Jcgm::where('selecionado', 0);
        /*  $Anoselecionado = Jcgm::when($this->active, function ($query) {
        return $query->where('selecionado', false);
        }); */

        //Obter A edição Selecionada pelo admin
        //$Anoselecionado = Jcgm::where('selecionado', 0)->get();
        $this->Anoselecionado = Jcgm::where('selecionado', 1)->first();

        // dd($Anoselecionado);

        $jornadas = Jcgm::paginate(6);
        //   $jornadas = $jornadas->paginate(5);
        //$debugQuery = $Anoselecionado->toSql();

        return view('livewire.jornadas', ['jornadas' => $jornadas]); //'Anoselecionado' => $Anoselecionado, 'debugQuery' => $debugQuery]
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
    public function confirmingJornadaDeletion($id)
    {
        $this->confirmingJornadaDeletion = $id;

    }

    //Remover Palestra
    public function deleteJornada(Jcgm $id)
    {
        $id->delete();

        //Se eliminar uma edição das jornadas que esteja selecionada
        //após eliminar tem se que atribuir o atributo selecionado a outro registro
        $selecionado = DB::table('jcgms')->latest('created_at')->first();
        $this->jornada = Jcgm::find($selecionado->id);

        $selecionado = Jcgm::find($selecionado->id);
        $selecionado['selecionado'] = 1;
        $selecionado->save();

        $this->confirmingJornadaDeletion = false;
    }

    //Pop up de Confirmação para Adicionar
    public function confirmJornadaAdd()
    {

        $this->reset(['jornada']);
        $this->confirmingJornadaAdd = true;

    }
    public function confirmJornadaEdit(Jcgm $jornada)
    {
        $this->jornada = $jornada;
        $this->confirmingJornadaAdd = true;

    }

    // public function addPalestra()
    // {
    //     $this->validate();
    //     create();
    //     $this->confirmingPalestraAdd = false;

    // }

    public function addJornada()
    {
        $this->validate();

        // $this->jornada['selecionado'] = $this->jornada['selecionado'] ? 1 : 0 ?? 0;
        // dd($this->jornada);

        // if ($this->jornada['selecionado'] ?? null == null) {
        //     $this->jornada['selecionado'] = 0;
        //     dd($this->jornada);
        // } else {
        //     dd($this->jornada);

        // }

        if (isset($this->jornada->id)) {
            $this->jornada->save();
        } else {

            Jcgm::create([
                'ano' => $this->jornada['ano'],
                'siteApp' => $this->jornada['siteApp'],
                'desc_Ecgm' => $this->jornada['desc_Ecgm'] ?? '-',
                'desc_Dwm' => $this->jornada['desc_Dwm'] ?? '-',
                'desc_NCGM' => $this->jornada['desc_NCGM'] ?? '-',
                'selecionado' => $this->jornada['selecionado'] ?? 0,

            ]);
        }

        //Obter o valor do ultimo parametro do "selecionado"
        $data = DB::table('jcgms')->latest('created_at')->first();

        if ($data->selecionado != 0) {
            //Zerar
            DB::table('jcgms')->update(['selecionado' => 0]);
            //Encontrar a edição das jornadas com este $id
            $selecionado = Jcgm::find($data->id);
            $selecionado['selecionado'] = 1;
            $selecionado->save();

        }
        $this->confirmingJornadaAdd = false;

    }

    public function verificaCheckbox($data)
    {
        //Ultimo Registro
        $this->jornada = Jcgm::find($data->id);

        // //Se for tudo Zero
        // $checkIfAllZero = array_unique([0]);
        // //Contar todos os zeros
        // $results = Jcgm::whereIn('selecionado', $checkIfAllZero)->count();
        // if ($results == Jcgm::count()) {
        //     //dd($results, Jcgm::count());
        //     $this->jornada['selecionado'] = 1;
        //     $this->jornada->save();
        // }

        //Muda para tudo para zero se a checkbox de selecionar Jornada for True
        if ($data->selecionado != 0) {
            DB::table('jcgms')->update(['selecionado' => 0]);

            $this->jornada['selecionado'] = 1;

            $this->jornada->save();

        }

//Se verificar que nenhuma edição foi selecionada então não deixa mudar para nenhuma selecionada
        $checkIfAllZero = array_unique([0]);

        $results = Jcgm::whereIn('selecionado', $checkIfAllZero)->count();

        if ($results == Jcgm::count()) {
            //dd($results, Jcgm::count());
            $this->jornada['selecionado'] = 1;
            $this->jornada->save();

        }

    }

    //Toggle para Selecionar edição da jornada
    public function selecionar(Jcgm $jornada)
    {
        //Jcgm::update(['selecionado' => 0]);

        //Muda todas as colunas selecionado da tabela jcgms
        DB::table('jcgms')->update(['selecionado' => 0]);

        $this->jornada = $jornada;

        if ($this->jornada['selecionado'] == 0) {
            $this->jornada['selecionado'] = 1;
        } else {
            $this->jornada['selecionado'] = 0;
        }

        $this->jornada->save();

        //Se verificar que nenhuma edição foi selecionada então não deixa mudar para nenhuma selecionada
        $checkIfAllZero = array_unique([0]);

        $results = Jcgm::whereIn('selecionado', $checkIfAllZero)->count();

        if ($results == Jcgm::count()) {
            //dd($results, Jcgm::count());
            $this->jornada['selecionado'] = 1;
            $this->jornada->save();

        }

    }

}
