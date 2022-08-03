@extends('layouts.main')

@section('content')
@section('title', 'Cartaz')


@foreach ($cartaz as $item)
    <div class="flex text-center flex-wrap center-items justify-center mt-10">
        <div class="w-6/12 sm:w-4/12 px-4">
            <img src={{ Storage::url($item->ficheiro->filePath) }} width="500px" alt="..."
                class="shadow rounded max-w-full h-auto align-middle border-none" />
        </div>


    </div>

    <div id="title" class="text-center mt-6 my-10">
        <h1 class="font-bold text-4xl text-white">Cartaz das Jornadas
            {{ App\Models\Jcgm::where(['selecionado' => 1])->first()->ano }}</h1>
        <p class="text-light text-gray-500 text-base">

            {{ $item->nome_aluno }} , {{ $item->numero_aluno }}
        </p>
    </div>
@break
@endforeach
@endsection
