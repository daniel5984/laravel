@extends('layouts.main')

@section('content')
@section('title', 'Projetos Alunos')


<div>

    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-8 mx-auto">
            <div class="lg:flex lg:-mx-2">
                <div class="space-y-3 lg:w-1/5 lg:px-2 lg:space-y-4">
                    <a href="{{ route('projeto.tudo') }}"
                        class="block font-medium text-blue-600 dark:text-blue-500 hover:underline">Tudo</a>
                    <a href="{{ route('projeto.modelacao') }}"
                        class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Modelação
                        3D</a>
                    <a href="{{ route('projeto.web') }}"
                        class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Programação
                        Web</a>
                    <a href="{{ route('projeto.unity') }}"
                        class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Unity
                        3D
                    </a>
                </div>

                <div class="mt-6 lg:mt-0 lg:px-2 lg:w-4/5 ">
                    <div class="flex items-center justify-between text-sm tracking-widest uppercase ">
                        <p class="text-gray-500 dark:text-gray-300">
                            {{ sizeof($projetosAlunos) }} Items</p>
                        {{-- <div class="flex items-center">
                        <p class="text-gray-500 dark:text-gray-300">Sort</p>
                        <select class="font-medium text-gray-700 bg-transparent dark:text-gray-500 focus:outline-none">
                            <option value="#">Recommended</option>
                            <option value="#">Size</option>
                            <option value="#">Price</option>
                        </select>
                    </div> --}}
                    </div>

                    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">



                        @foreach ($projetosAlunos as $item)
                            <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">

                                {{-- Imagem Preview --}}
                                @if (isset($item->ficheiro->filePath))
                                    <img class="object-cover w-full rounded-md max-h-max"
                                        src="{{ Storage::url($item->ficheiro->filePath) }}" alt="Image">
                                @endif



                                <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">
                                    {{ $item->ficheiro->nome_ficheiro }}</h4>
                                <p class="text-blue-500">{{ $item->categoria }}</p>
                                <h4 class="mt-2 text-base font-medium text-gray-700 dark:text-gray-200">
                                    {{ $item->nomes_alunos }}</h4>

                                {{-- Botão para mais informaões --}}
                                {{-- botão Abrir --}}
                                <div x-data="{ show: false }" class="">
                                    <button @click="show=true"
                                        class="flex  items-center justify-center  px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700"
                                        type="button"><span class="mx-1">Saber mais</span>
                                    </button>

                                    {{-- Mostrar quando se clica no botão --}}
                                    <div x-show="show"
                                        class="absolute inset-0 flex h-auto items-center justify-center ">
                                        <div @click.away="show = false" class="z-50 w-1/2  p-6 bg-gray-800">


                                            {{-- Titulo --}}
                                            <div
                                                class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                                {{-- titulo --}}
                                                <h3 class="text-2xl text-white">Projeto:
                                                    {{ $item->ficheiro->nome_ficheiro }}
                                                </h3>

                                            </div>

                                            <div class="mt-4 ">




                                                @if ($item->imagemVideo == 'Video')
                                                    <video class="object-cover w-full rounded-md  max-h-max" controls>
                                                        <source src="{{ $item->link_video }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @elseif($item->imagemVideo == '3D')
                                                    {{-- Elemento 3D --}}
                                                    <style>
                                                        model-viewer {
                                                            width: 500px;
                                                            height: 500px;
                                                            margin: auto;
                                                        }
                                                    </style>


                                                    <div class="ax-h-max">
                                                        <model-viewer class="object-cover" id="mv-demo"
                                                            src="{{ Storage::url($item->ficheiro->modeloPath) }}"
                                                            auto-rotate camera-controls>
                                                        </model-viewer>
                                                    </div>



                                                    {{-- Video --}}
                                                    {{-- <video class="object-cover w-full rounded-md h-72 xl:h-80" controls>
                                                        <source
                                                            src="http://jcgm.estg.ipvc.pt/assets/img/VideoPromocional.mp4"
                                                            type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video> --}}
                                                @elseif($item->imagemVideo == 'Imagem' && isset($item->ficheiro->filePath))
                                                    <img class="object-cover w-full rounded-md max-h-max"
                                                        src="{{ Storage::url($item->ficheiro->filePath) }}"
                                                        alt="Image">
                                                @elseif($item->imagemVideo == 'Imagem')
                                                    <img class="object-cover w-full rounded-md max-h-max"
                                                        src="{{ $item->ficheiro->link_principal }}" alt="Image">
                                                @endif



                                                {{-- Descrição --}}
                                                <p class="p-4 mt-4 mb-4 text-white text-sm"> {{ $item->obs }}
                                                    </h4>
                                                </p>

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
        </div>
    </section>

</div>

@endsection
