<div class="p-6 sm:px-20 bg-white border-b border-gray-200">



    <div class="mt-8 text-2xl flex justify-between">
        <div>

            @if ($Anoselecionado)
                {{ 'Jornadas de ' . $Anoselecionado->ano }}
            @endif

        </div>
        <div class="mr-2"></div>

        {{-- Limitar aos users que tenham a role de fazer create de palestra --}}
        @can('jornadas.create')
            <x-jet-button wire:click="confirmJornadaAdd">
                Adicionar
            </x-jet-button>
        @endcan


    </div>
    {{-- {{ $debugQuery }} --}}
    <div class="mt-6 ">
        <div class="flex justify-between">

            <div class="p-2"><input wire:model.debounce.300ms="pesquisa"
                    class="shadow appearence-none border rounded w-full p-2 px-3 text-gray-700 leading-tight focus:outline-none  focus:shadow-outlines"
                    type="search" placeholder="pesquisar"></div>
            <div class="form-check">
                <input type="checkbox" wire:model="active"
                    class="form-check-input appearance-none h-6 w-6 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                Apenas Selecionados
            </div>
        </div>
        <table class="table-auto w-full">
            <thead>
                <tr>

                    <th class="px-4 py-2">
                        <div class="flex items-center">ID</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Ano</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Site</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Status</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Ações</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jornadas as $item)
                    <tr>
                        {{-- @php
                            echo $item;
                        @endphp --}}
                        <td class="border px-4 py-2">{{ $item->id }}</td>
                        <td class="border px-4 py-2">{{ $item->ano }}</td>

                        <td class="border px-4 py-2">{{ $item->siteApp }}</td>
                        <td class="border px-4 py-2">{{ $item->selecionado ? 'Selecionado' : 'Não Selecionado' }}</td>
                        <td class="border px-6 py-2 ">

                            {{-- Botão Selecionar --}}
                            <button
                                class="inline-flex ml-3 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                wire:click="selecionar({{ $item->id }})">
                                Selecionar
                            </button>

                            {{-- Botão Editar --}}
                            <button wire:click="confirmJornadaEdit({{ $item->id }})"
                                class="inline-flex ml-3 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                Editar
                            </button>

                            <x-jet-danger-button class="ml-3"
                                wire:click="confirmingJornadaDeletion({{ $item->id }})"
                                wire:loading.attr="disabled">
                                Eliminar
                            </x-jet-danger-button>

                        </td>


                    </tr>
                @endforeach
            </tbody>



        </table>


    </div>
    <div class="mt-4">
        {{ $jornadas->links() }}
    </div>



    {{-- DELETAR --}}
    <x-jet-dialog-modal wire:model="confirmingJornadaDeletion">
        <x-slot name="title">
            {{ __('Delete Jornada') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Tem a certeza que quer remover esta jornada?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingJornadaDeletion',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deleteJornada({{ $confirmingJornadaDeletion }})"
                wire:loading.attr="disabled">
                {{ __('Remover Jornada') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>


    {{-- CRIAR / Editar --}}
    <x-jet-dialog-modal wire:model="confirmingJornadaAdd">
        <x-slot name="title">
            {{ isset($this->jornada->id) ? 'Editar' : 'Adicionar item' }}
        </x-slot>

        <x-slot name="content">

            <x-jet-label for="ano" value="{{ __('Ano') }}" />
            <x-jet-input id="ano" type="text" class="mt-1 block w-full" wire:model.defer="jornada.ano" />
            <x-jet-input-error for="jornada.ano" class="mt-2" />

            <x-jet-label for="site" value="{{ __('Site') }}" />
            <x-jet-input id="site" type="text" class="mt-1 block w-full" wire:model.defer="jornada.siteApp" />
            <x-jet-input-error for="jornada.siteApp" class="mt-2" />

            <x-jet-label for="desc_Ecgm" value="{{ __('desc_Ecgm') }}" />
            <x-jet-input id="desc_Ecgm" type="text" class="mt-1 block w-full" wire:model.defer="jornada.desc_Ecgm" />
            <x-jet-input-error for="jornada.desc_Ecgm" class="mt-2" />

            <x-jet-label for="desc_Dwm" value="{{ __('desc_Dwm') }}" />
            <x-jet-input id="desc_Dwm" type="text" class="mt-1 block w-full" wire:model.defer="jornada.desc_Dwm" />
            <x-jet-input-error for="jornada.desc_Dwm" class="mt-2" />

            <x-jet-label for="desc_NCGM" value="{{ __('desc_NCGM') }}" />
            <x-jet-input id="desc_NCGM" type="text" class="mt-1 block w-full" wire:model.defer="jornada.desc_NCGM" />
            <x-jet-input-error for="jornada.desc_NCGM" class="mt-2" />


            {{-- checkBox --}}
            <div class="col-span-6 sm:col-span-4 mt-4">
                <label class="flex items-center">
                    <input type="checkbox" wire:model.defer="jornada.selecionado" class="form-checkbox">
                    <span class="ml-2 text-sm text-gray-600 ">Selecionado</span>
                </label>
            </div>


        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingJornadaAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="addJornada()" wire:loading.attr="disabled">
                {{ __('Adicionar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
