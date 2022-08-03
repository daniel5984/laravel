<div class="p-6 sm:px-20 bg-white border-b border-gray-200">



    <div class="mt-8 text-2xl flex justify-between">
        <div>

            {{-- @if ($Anoselecionado)
                {{ 'Jornadas de ' . $Anoselecionado->ano }}
            @endif --}}

        </div>
        <div class="mr-2">






        </div>
        @can('workshops.create')
            <x-jet-button wire:click="confirmCartazAdd">
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
                        <div class="flex items-center">Nome Aluno</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Número Aluno</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Imagem</div>
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($cartazes as $item)
                    <tr>

                        <td class="border px-4 py-2">{{ $item->id }}</td>
                        <td class="border px-4 py-2">{{ $item->nome_aluno }}</td>
                        <td class="border px-4 py-2">{{ $item->numero_aluno }}</td>
                        <td class="border px-4 place-content-center"> <img
                                src="{{ Storage::url($item->ficheiro->filePath) }}"
                                class="w-10 h-10 mx-auto rounded-full" alt="">
                        </td>


                        <td class="border px-6 py-2 ">


                            {{-- Botão Editar --}}
                            <button wire:click="confirmCartazEdit({{ $item->id }})"
                                class="inline-flex ml-3 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                Editar
                            </button>

                            <x-jet-danger-button class="ml-3"
                                wire:click="confirmingCartazDeletion({{ $item->id }})" wire:loading.attr="disabled">
                                Eliminar
                            </x-jet-danger-button>

                        </td>


                    </tr>
                @endforeach
            </tbody>

        </table>


    </div>
    <div class="mt-4">
        {{ $cartazes->links() }}
    </div>



    {{-- DELETAR --}}
    <x-jet-dialog-modal wire:model="confirmingCartazDeletion">
        <x-slot name="title">
            {{ __('Delete Cartaz') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Tem a certeza que quer remover este Cartaz?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingCartazDeletion',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deleteCartaz({{ $confirmingCartazDeletion }})"
                wire:loading.attr="disabled">
                {{ __('Remover Cartaz') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>


    {{-- CRIAR / Editar --}}
    <x-jet-dialog-modal wire:model="confirmingCartazAdd">
        <x-slot name="title">
            {{ isset($this->cartaz->id) ? 'Editar' : 'Adicionar item' }}
        </x-slot>

        <x-slot name="content">

            <form>

                {{-- Nome Aluno --}}
                <div class="sm:col-span-6 ">
                    <label for="cartaz.nome_aluno" class="block text-sm font-medium text-gray-700"> Nome do Aluno
                    </label>
                    <div class="mt-1">
                        <input type="text" id="cartaz.nome_aluno" wire:model.lazy="cartaz.nome_aluno" name="title"
                            class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('cartaz.nome_aluno')
                        <span class="text-red-400 ">{{ $message }}</span>
                    @enderror
                </div>


                {{-- Numero Aluno --}}
                <div class="sm:col-span-6 ">
                    <label for="cartaz.numero_aluno" class="block text-sm font-medium text-gray-700"> Número Aluno
                    </label>
                    <div class="mt-1">
                        <input type="text" id="cartaz.numero_aluno" wire:model.lazy="cartaz.numero_aluno"
                            name="title"
                            class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('cartaz.numero_aluno')
                        <span class="text-red-400 ">{{ $message }}</span>
                    @enderror
                </div>


                {{-- Imagem do Cartaz --}}
                <div class="sm:col-span-6">
                    <label for="image" class="block text-sm font-medium text-gray-700"> Post Cartaz </label>
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
            <x-jet-secondary-button wire:click="$set('confirmingCartazAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="addCartaz()" wire:loading.attr="disabled">
                {{ __('Adicionar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
