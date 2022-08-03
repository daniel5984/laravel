<div class="p-6 sm:px-20 bg-white border-b border-gray-200">



    <div class="mt-8 text-2xl flex justify-between">
        <div>

            {{-- @if ($Anoselecionado)
                {{ 'Jornadas de ' . $Anoselecionado->ano }}
            @endif --}}

        </div>
        <div class="mr-2"></div>
        @can('workshops.create')
            <x-jet-button wire:click="confirmWorkshopAdd">
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
                        <div class="flex items-center">Nome Workshop</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Alunos</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Imagem</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Ações</div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workshops as $item)
                    <tr>
                        {{-- @php
                            echo $item;
                        @endphp --}}
                        <td class="border px-4 py-2">{{ $item->id }}</td>
                        <td class="border px-4 py-2">{{ $item->nome_workshop }}</td>

                        <td class="border px-4 py-2">{{ $item->nomes_alunos }}</td>
                        <td class="border px-4 place-content-center"> <img
                                src="{{ Storage::url($item->ficheiro->filePath) }}"
                                class="w-10 h-10 mx-auto rounded-full" alt="">
                        </td>
                        {{-- {{ \Illuminate\Support\Str::limit($item->ficheiro->link_principal, 30) }}</td> --}}
                        <td class="border px-6 py-2 ">


                            {{-- Botão Editar --}}
                            <button wire:click="confirmWorkshopEdit({{ $item->id }})"
                                class="inline-flex ml-3 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                Editar
                            </button>

                            <x-jet-danger-button class="ml-3"
                                wire:click="confirmingWorkshopDeletion({{ $item->id }})"
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
        {{ $workshops->links() }}
    </div>



    {{-- DELETAR --}}
    <x-jet-dialog-modal wire:model="confirmingWorkshopDeletion">
        <x-slot name="title">
            {{ __('Delete Workshop') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Tem a certeza que quer remover este Workshop?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingWorkshopDeletion',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deleteWorkshop({{ $confirmingWorkshopDeletion }})"
                wire:loading.attr="disabled">
                {{ __('Remover Workshop') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>


    {{-- CRIAR / Editar --}}
    <x-jet-dialog-modal wire:model="confirmingWorkshopAdd">
        <x-slot name="title">
            {{ isset($this->workshop->id) ? 'Editar' : 'Adicionar item' }}
        </x-slot>

        <x-slot name="content">
            {{-- <x-jet-label for="nome_workshop" value="{{ __('Nome') }}" />
            <x-jet-input id="nome_workshop" type="text" class="mt-1 block w-full"
                wire:model.defer="workshop.nome_workshop" />
            <x-jet-input-error for="workshop.nome_workshop" class="mt-2" />

            <x-jet-label for="nomes_alunos" value="{{ __('Alunos') }}" />
            <x-jet-input id="nomes_alunos" type="text" class="mt-1 block w-full"
                wire:model.defer="workshop.nomes_alunos" />
            <x-jet-input-error for="workshop.nomes_alunos" class="mt-2" />

            <x-jet-label for="tipo_workshop" value="{{ __('Tipo Workshop') }}" />
            <x-jet-input id="tipo_workshop" type="text" class="mt-1 block w-full"
                wire:model.defer="workshop.tipo_workshop" />
            <x-jet-input-error for="workshop.tipo_workshop" class="mt-2" />

            <x-jet-label for="obs" value="{{ __('Obs') }}" />
            <x-jet-input id="obs" type="text" class="mt-1 block w-full" wire:model.defer="workshop.obs" />
            <x-jet-input-error for="workshop.obs" class="mt-2" />

            <x-jet-label for="link_principal" value="{{ __('Link') }}" />
            <x-jet-input id="link_principal" type="text" class="mt-1 block w-full"
                wire:model.defer="ficheiro.link_principal" />
            <x-jet-input-error for="ficheiro.link_principal" class="mt-2" /> --}}


            <form>
                {{-- <x-jet-label for="nome_workshop" value="{{ __('Nome') }}" />
                <x-jet-input id="nome_workshop" type="text" class="mt-1 block w-full"
                    wire:model.defer="workshop.nome_workshop" />
                <x-jet-input-error for="workshop.nome_workshop" class="mt-2" /> --}}

                {{-- Nome Workshop --}}
                <div class="sm:col-span-6 ">
                    <label for="workshop.nome_workshop" class="block text-sm font-medium text-gray-700"> Nome Workshop
                    </label>
                    <div class="mt-1">
                        <input type="text" id="workshop.nome_workshop" wire:model.lazy="workshop.nome_workshop"
                            name="title"
                            class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('workshop.nome_workshop')
                        <span class="text-red-400 ">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Tipo Workshop --}}
                <div class="col-span-6 mt-4">
                    <label for="workshop.tipo_workshop" class="block text-sm font-medium text-gray-700">Tipo
                        Workshop</label>
                    <select id="workshop.tipo_workshop" wire:model.defer="workshop.tipo_workshop" name="Tipo Workshop"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <option>Html</option>
                        <option>Illustrator</option>
                        <option>Blender</option>
                        <option>Maya</option>
                        <option>Unity 3D</option>
                        <option>Web</option>


                    </select>
                    @error('workshop.tipo_workshop')
                        <span class="text-red-400 ">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Nomes Alunos --}}
                <div class="sm:col-span-6 mt-4">
                    <label for="workshop.nomes_alunos" class="block text-sm font-medium text-gray-700"> Nomes dos Alunos
                    </label>
                    <div class="mt-1">
                        <input type="text" id="workshop.nomes_alunos" wire:model.lazy="workshop.nomes_alunos"
                            name="title"
                            class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('workshop.nomes_alunos')
                        <span class="text-red-400 ">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Guiao Alunos --}}
                <div class="sm:col-span-6 mt-4">
                    <label for="workshop.guiao" class="block text-sm font-medium text-gray-700"> Link para o Guião
                    </label>
                    <div class="mt-1">
                        <input type="text" id="workshop.guiao" wire:model.lazy="workshop.guiao" name="title"
                            class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('workshop.guiao')
                        <span class="text-red-400 ">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Desc --}}
                <div class="sm:col-span-6 pt-5">
                    <label for="workshop.desc" class="block text-sm font-medium text-gray-700">Descrição</label>
                    <div class="mt-1">
                        <textarea id="workshop.desc" rows="3" wire:model.lazy="workshop.desc"
                            class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border  py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                    @error('workshop.desc')
                        <span class="text-red-400 ">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Imagem do Logo --}}
                <div class="sm:col-span-6">
                    <label for="image" class="block text-sm font-medium text-gray-700"> Post Image </label>
                    @if ($image)
                        Normal Image
                        <img src="{{ $image->temporaryUrl() }}" alt="">
                    @elseif ($storeimg)
                        Store Img

                        <img src="{{ Storage::url($storeimg) }}">
                    @endif
                    <div class="mt-1">
                        <input type="file" id="image" wire:model="image" name="image"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('image')
                        <span class="text-red-400 ">{{ $message }}</span>
                    @enderror
                </div>


        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingWorkshopAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="addWorkshop()" wire:loading.attr="disabled">
                {{ __('Adicionar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
