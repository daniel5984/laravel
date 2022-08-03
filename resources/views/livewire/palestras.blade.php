<div class="p-6 sm:px-20 bg-white border-b border-gray-200">



    <div class="mt-8 text-2xl flex justify-between">
        <div>Jornadas de {{ App\Models\Jcgm::where(['selecionado' => 1])->first()->ano }}</div>
        <div class="mr-2"></div>
        @can('palestras.create')
            <x-jet-button wire:click="confirmPalestraAdd">
                Adicionar
            </x-jet-button>
        @endcan
    </div>
    {{ $debugQuery }}
    <div class="mt-6 ">
        <div class="flex justify-between">

            <div class="p-2"><input wire:model.debounce.300ms="pesquisa"
                    class="shadow appearence-none border rounded w-full p-2 px-3 text-gray-700 leading-tight focus:outline-none  focus:shadow-outlines"
                    type="search" placeholder="pesquisar"></div>
            <div class="form-check">
                <input type="checkbox" wire:model="active"
                    class="form-check-input appearance-none h-6 w-6 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                Mostrar Todos
            </div>
        </div>
        <table class="table-auto w-full">
            <thead>
                <tr>

                    <th class="px-4 py-2">
                        <div class="flex items-center">ID</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Hora</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Título</div>
                    </th>

                    <th class="px-4 py-2">
                        <div class="flex items-center">Oradores</div>
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
                @foreach ($palestras as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $item->id }}</td>
                        <td class="border px-4 py-2">{{ $item->hora }}</td>
                        <td class="border px-4 py-2">{{ $item->titulo }}</td>
                        <td class="border px-4 py-2">{{ $item->nome_orador }}</td>
                        <td class="border px-4 py-2">{{ $item->site }}</td>
                        <td class="border px-4 py-2">{{ $item->status ? 'Mostrar' : 'Não    Mostrar' }}</td>
                        <td class="border px-4 py-2">

                            {{-- Botão Editar --}}
                            <button wire:click="confirmPalestraEdit({{ $item->id }})"
                                class="inline-flex ml-3 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                Editar
                            </button>


                            {{-- Botão Eliminar --}}
                            <x-jet-danger-button class="ml-3"
                                wire:click="confirmingPalestraDeletion({{ $item->id }})"
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
        {{ $palestras->links() }}
    </div>


    <x-jet-dialog-modal wire:model="confirmingPalestraDeletion">
        <x-slot name="title">
            {{ __('Delete Palestra') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Tem a certeza que quer remover esta palestra?') }}


        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingPalestraDeletion',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deletePalestra({{ $confirmingPalestraDeletion }})"
                wire:loading.attr="disabled">
                {{ __('Remover Palestra') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>




    {{-- Formulário de criação de palestra --}}
    <x-jet-dialog-modal wire:model="confirmingPalestraAdd">
        <x-slot name="title">
            {{ isset($this->palestra->id) ? 'Editar' : 'Adicionar item' }}
        </x-slot>

        <x-slot name="content">

            <x-jet-label for="titulo" value="{{ __('Titulo') }}" />
            <x-jet-input id="titulo" type="text" class="mt-1 block w-full" wire:model.defer="palestra.titulo" />
            <x-jet-input-error for="palestra.titulo" class="mt-2" />

            <x-jet-label for="orador" value="{{ __('Nome do Orador') }}" />
            <x-jet-input id="orador" type="text" class="mt-1 block w-full"
                wire:model.defer="palestra.nome_orador" />
            <x-jet-input-error for="palestra.nome_orador" class="mt-2" />

            <x-jet-label for="site" value="{{ __('Site') }}" />
            <x-jet-input id="site" type="text" class="mt-1 block w-full" wire:model.defer="palestra.site" />
            <x-jet-input-error for="palestra.site" class="mt-2" />

            <x-jet-label for="desc" value="{{ __('Descrição') }}" />
            <x-jet-input id="desc" type="text" class="mt-1 block w-full" wire:model.defer="palestra.desc" />
            <x-jet-input-error for="palestra.desc" class="mt-2" />

            <x-jet-label for="data" value="{{ __('Data') }}" />
            <x-jet-input id="data" type="text" class="mt-1 block w-full" wire:model.defer="palestra.data" />
            <x-jet-input-error for="palestra.data" class="mt-2" />

            <x-jet-label for="hora" value="{{ __('Hora') }}" />
            <x-jet-input id="hora" type="text" class="mt-1 block w-full" wire:model.defer="palestra.hora" />
            <x-jet-input-error for="palestra.hora" class="mt-2" />

            <div class="col-span-6 sm:col-span-4 mt-4">
                <label class="flex items-center">

                    <input type="checkbox" wire:model.defer="palestra.status" class="form-checkbox">
                    <span class="ml-2 text-sm text-gray-600 ">Ativo</span>
                </label>

            </div>



        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingPalestraAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="addPalestra()" wire:loading.attr="disabled">
                {{ __('Adicionar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
