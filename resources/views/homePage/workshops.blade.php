@extends('layouts.main')

@section('content')
@section('title', 'Workshops')



<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-8 mx-auto">
        @if (count($workshops) > 0)

            <div class="lg:flex lg:-mx-2">

                <div class="mt-6 lg:mt-0 lg:px-2 lg:w-4/5 ">
                    <div class="flex items-center justify-between text-sm tracking-widest uppercase ">
                        <p class="text-gray-500 dark:text-gray-300">
                            {{ App\Models\Ficheiro::where(['categoria' => 'Workshop'])->count() }}
                            Items</p>

                    </div>

                    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">



                        @foreach ($workshops as $workshop)
                            <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                                @if (isset($workshop->ficheiro->filePath))
                                    <img class="object-cover w-full rounded-mdmax-h-max" {{-- src="{{ Storage::url($workshop->ficheiro->filePath) }}" alt="Image"> --}}
                                        src="{{ Storage::disk('s3')->response($workshop->ficheiro->filePath) }}"
                                        alt="Image">
                                @else
                                    <img class="object-cover w-full rounded-md max-h-max"
                                        src="{{ $workshop->ficheiro->link_principal }}" alt="Image">
                                @endif
                                <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">
                                    {{ $workshop->nome_workshop }}</h4>
                                <p class="text-blue-500">{{ $workshop->nomes_alunos }}</p>
                                <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">
                                    {{ $workshop->tipo_workshop }}</h4>

                                {{-- botão Abrir --}}
                                <div x-data="{ show: false }" class="">
                                    <button @click="show=true"
                                        class="flex  items-center justify-center  px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700"
                                        type="button">Abrir
                                    </button>

                                    {{-- Mostrar quando se clica no botão --}}
                                    <div x-show="show" class="absolute inset-0 flex items-center justify-center ">
                                        <div @click.away="show = false" class="z-50 w-1/2  p-6 bg-gray-800"">
                                            <div
                                                class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                                {{-- titulo --}}
                                                <h3 class="text-2xl text-white">Workshop de
                                                    {{ $workshop->nome_workshop }}
                                                </h3>


                                            </div>
                                            <div class="mt-4 ">
                                                @if (isset($workshop->ficheiro->filePath))
                                                    <div class="">
                                                        <img class="object-scale-down  h-48 w-96 rounded-md mx-auto "
                                                            src="{{ Storage::url($workshop->ficheiro->filePath) }}"
                                                            alt="Image">
                                                    </div>
                                                @else
                                                    <div class="">
                                                        <img class="object-scale-down h-48 w-96 rounded-md mx-auto "
                                                            src="{{ $workshop->ficheiro->link_principal }}"
                                                            alt="Image">
                                                    </div>
                                                @endif
                                                {{-- Descrição --}}
                                                <p class="mt-6 mb-4 text-white text-sm"> {{ $workshop->desc }}</h4>
                                                </p>

                                                @if ($workshop->guiao)
                                                    <a href="{{ $workshop->guiao }}" target="_blank">
                                                        <button
                                                            class="px-4 py-2 text-white bg-blue-500 rounded"">Guião</button>
                                                    </a>
                                                @endif

                                                {{-- Botão cancelar --}}
                                                <button @click="show=false"
                                                    class="px-4 py-2 text-white bg-red-600 rounded">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        @else
            <div id="title" class="text-center my-10">
                <h1 class="font-bold text-4xl text-white">Ainda não tem nenhum conteúdo nas palestras para as jornadas
                    {{ App\Models\Jcgm::where(['selecionado' => 1])->first()->ano }}</h1>

            </div>

        @endif

    </div>
</section>



@endsection
