@extends('layouts.main')

@section('content')
@section('title', 'Palestras')
@inject('Palestras', 'App\Http\Controllers\Home\Palestras')
<section class="bg-white dark:bg-gray-900">
    @if (sizeof($palestras) > 0)
        <div class="container px-6 py-8 mx-auto">

            <div class="lg:flex lg:-mx-2" x-data="{ open: true, open2: false }">


                <div class="space-y-3 lg:w-1/5 lg:px-2 lg:space-y-4">
                    <button
                        :class="open && !open2 ? 'dark:text-blue-500  block font-medium text-gray-500  hover:underline' :
                            'block font-medium dark:text-gray-300 text-gray-500  hover:underline'"
                        x-on:click="open=true,open2=false">Primeiro
                        Dia</button>
                    <button
                        :class="open2 && !open ? 'dark:text-blue-500  block font-medium text-gray-500  hover:underline' :
                            'block font-medium dark:text-gray-300 text-gray-500  hover:underline'"
                        x-on:click="open=false,open2=true">Segundo
                        Dia</button>
                </div>

                {{-- Grelha 1 --}}

                <div class="flex flex-col" x-show="open">

                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">

                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <p class="px-4 py-4 whitespace-nowrap text-lg  font-medium text-gray-300">
                                @foreach ($palestras as $item)
                                    @if ($item->dia == 'primeiroDia')
                                        {{ $item->data }}
                                    @break
                                @endif
                            @endforeach
                        </p>
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="border-b">
                                    <tr>
                                        <th scope="col"
                                            class="text-lg  font-medium text-gray-300 px-6 py-4 text-left">
                                            Hora
                                        </th>
                                        <th scope="col"
                                            class="text-lg   font-medium text-gray-300 px-6 py-4 text-left">
                                            Palestra
                                        </th>
                                        <th scope="col"
                                            class="text-lg   font-medium text-gray-300 px-6 py-4 text-left">
                                            Orador
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($palestras as $item)
                                        @if ($item->dia == 'primeiroDia')
                                            {{-- Parte de Baixo --}}
                                            <tr class="border-b">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-lg  font-normal text-gray-300">
                                                    {{ $item->hora }}</td>
                                                <td
                                                    class="text-lg  text-gray-300 font-medium px-6 py-4 whitespace-nowrap">
                                                    {{ $item->titulo }}
                                                </td>
                                                <td
                                                    class="text-lg  text-gray-300 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->nome_orador }}
                                                </td>

                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Grelha 2 --}}
            <div class="flex flex-col" x-show="open2">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <p class="px-4 py-4 whitespace-nowrap text-lg  font-medium text-gray-300">
                            @foreach ($palestras as $item)
                                @if ($item->dia == 'segundoDia')
                                    {{ $item->data }}
                                @break
                            @endif
                        @endforeach
                    </p>
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            {{-- Parte de cima --}}
                            <thead class="border-b">
                                <tr>
                                    <th scope="col"
                                        class="text-lg  font-medium text-gray-300 px-6 py-4 text-left">
                                        Hora
                                    </th>
                                    <th scope="col"
                                        class="text-lg   font-medium text-gray-300 px-6 py-4 text-left">
                                        Palestra
                                    </th>
                                    <th scope="col"
                                        class="text-lg   font-medium text-gray-300 px-6 py-4 text-left">
                                        Orador
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($palestras as $item)
                                    @if ($item->dia == 'segundoDia')
                                        {{-- Parte de Baixo --}}
                                        <tr class="border-b">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-lg  font-normal text-gray-300">
                                                {{ $item->hora }}</td>
                                            <td
                                                class="text-lg  text-gray-300 font-medium px-6 py-4 whitespace-nowrap">
                                                {{ $item->titulo }}
                                            </td>
                                            <td
                                                class="text-lg  text-gray-300 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $item->nome_orador }}
                                            </td>

                                        </tr>
                                    @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
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

</div>
</div>
</section>

@endsection


{{-- Dropdown --}}
{{-- <div x-data="{ open: false }">
                <button @click="open = true">Open Dropdown</button>
                <ul x-show="open" @click.away="open = false">
                    Dropdown Body
                </ul>
            </div> --}}
