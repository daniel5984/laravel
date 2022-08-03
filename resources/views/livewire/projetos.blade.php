<div class="p-6 sm:px-20 bg-white border-b border-gray-200">



    <div class="mt-8 text-2xl flex justify-between">
        <div>

            {{-- @if ($Anoselecionado)
                {{ 'Jornadas de ' . $Anoselecionado->ano }}
            @endif --}}

        </div>
        <div class="mr-2"></div>
        {{-- @can('workshops.create') --}}
        <x-jet-button wire:click="confirmProjetoAdd">
            Adicionar
        </x-jet-button>
        {{-- @endcan --}}

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
                        <div class="flex items-center">Nomes Alunos</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Nome Projeto</div>
                    </th>

                    {{-- Imagem,Video,3D --}}
                    <th class="px-4 py-2">
                        <div class="flex items-center">Conteúdo</div>
                    </th>



                    <th class="px-4 py-2">
                        <div class="flex items-center">Ano</div>
                    </th>

                    <th class="px-4 py-2">
                        <div class="flex items-center">Categoria</div>
                    </th>
                    <th class="px-4 py-2">
                        <div class="flex items-center">Ações</div>
                    </th>


                </tr>
            </thead>
            <tbody>
                @foreach ($projetos as $item)
                    <tr>
                        {{-- @php
                            echo $item;
                        @endphp --}}

                        <td class="border px-4 py-2">{{ $item->nomes_alunos }}</td>
                        <td class="border px-4 py-2">{{ $item->ficheiro->nome_ficheiro }}</td>
                        <td class="border px-4 py-2">{{ $item->imagemVideo }}</td>
                        <td class="border px-4 py-2">{{ $item->ano }}</td>
                        <td class="border px-4 py-2">{{ $item->categoria }}</td>
                        {{-- {{ \Illuminate\Support\Str::limit($item->ficheiro->link_principal, 30) }}</td> --}}
                        <td class="border px-6 py-2 ">

                            {{-- Botão Editar --}}
                            <button wire:click="confirmProjetoEdit({{ $item->id }})"
                                class="inline-flex ml-3 items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                Editar
                            </button>

                            <x-jet-danger-button class="ml-3"
                                wire:click="confirmingProjetoDeletion({{ $item->id }})"
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
        {{ $projetos->links() }}
    </div>



    {{-- DELETAR --}}
    <x-jet-dialog-modal wire:model="confirmingProjetoDeletion">
        <x-slot name="title">
            {{ __('Delete Projeto') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Tem a certeza que quer remover este Projeto?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingProjetoDeletion',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deleteProjeto({{ $confirmingProjetoDeletion }})"
                wire:loading.attr="disabled">
                {{ __('Remover Projeto') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>


    {{-- CRIAR / Editar --}}
    <x-jet-dialog-modal wire:model="confirmingProjetoAdd">
        <x-slot name="title">
            {{ isset($this->projeto->id) ? 'Editar' : 'Adicionar item' }}
        </x-slot>

        <x-slot name="content">


            <form x-data="{ open: true, open2: false }">

                {{-- Nomes Alunos --}}
                <div class="sm:col-span-6 mt-4">
                    <label for="projeto.nomes_alunos" class="block text-sm font-medium text-gray-700"> Nomes dos Alunos
                    </label>
                    <div class="mt-1">
                        <input type="text" id="projeto.nomes_alunos" wire:model.lazy="projeto.nomes_alunos"
                            name="title"
                            class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('projeto.nomes_alunos')
                        <span class="text-red-400 ">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Nomes doProjeto --}}
                <div class="sm:col-span-6 mt-4">
                    <label for="ficheiro.nome_ficheiro" class="block text-sm font-medium text-gray-700"> Nome do Projeto
                    </label>
                    <div class="mt-1">
                        <input type="text" id="ficheiro.nome_ficheiro" wire:model.lazy="ficheiro.nome_ficheiro"
                            name="title"
                            class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('ficheiro.nome_ficheiro')
                        <span class="text-red-400 ">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Nomes doProjeto --}}
                <div class="sm:col-span-6 mt-4">
                    <label for="projeto.ano" class="block text-sm font-medium text-gray-700"> Ano
                    </label>
                    <div class="mt-1">
                        <input type="text" id="projeto.ano" wire:model.lazy="projeto.ano" name="title"
                            class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('projeto.ano')
                        <span class="text-red-400 ">{{ $message }}</span>
                    @enderror
                </div>


                {{-- Categoria --}}
                <div class="col-span-6 mb-4 mt-4">
                    <label for="projeto.categoria" class="block text-sm font-medium text-gray-700">Categoria</label>
                    <select id="projeto.categoria" wire:model.defer="projeto.categoria" name="Categoria"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <option value="Web">Programação Web</option>
                        <option value="Modelação 3D">Modelação 3D</option>
                        <option value="Unity 3D">Unity 3D</option>



                    </select>
                    @error('projeto.categoria')
                        <span class="text-red-400 ">{{ $message }}</span>
                    @enderror
                </div>



                {{-- Tipo --}}
                <div x-data="{ tab: 'imagem' }">
                    <!-- nav -->
                    <div class="col-span-6 mb-4 mt-4">
                        <label class="block text-sm font-medium text-gray-700">Selecione tipo de conteúdo</label>
                        <nav class="tabs tabs-boxed">
                            <a wire:click="tipoImagem()" class="text-blue-500 underline"
                                :class="{ 'active': tab === 'imagem' }" x-on:click.prevent="tab = 'imagem'"
                                href="#">Imagem</a>
                            <a wire:click="tipoVideo()" class="text-blue-500 underline"
                                :class="{ 'active': tab === 'video' }" x-on:click.prevent="tab = 'video'"
                                href="#">Video</a>
                            <a wire:click="tipo3D()" class="text-blue-500 underline"
                                :class="{ 'active': tab === '3D' }" x-on:click.prevent="tab = '3D'"
                                href="#">Modelo 3D</a>
                        </nav>
                    </div>
                    <div x-show="tab === 'imagem'">
                        <h3>Imagem</h3>

                        <div class="sm:col-span-6 mt-4">
                            <label for="image" class="block text-sm font-medium text-gray-700"> Faça upload da
                                imagem
                            </label>

                            <div class="mt-1">
                                <input type="file" id="image" wire:model="ficheiroImagem" name="image"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('image')
                                <span class="text-red-400 ">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div x-show="tab === 'video'">
                        <h3>Video e imagem</h3>
                        {{-- Guiao Alunos --}}
                        <div class="sm:col-span-6 mt-4">
                            <label for="projeto.link_video" class="block text-sm font-medium text-gray-700"> Link para
                                o
                                Video
                            </label>
                            <div class="mt-1">
                                <input type="text" id="projeto.link_video" wire:model.lazy="projeto.link_video"
                                    name="title"
                                    class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('projeto.link_video')
                                <span class="text-red-400 ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 mt-4">
                            <label for="image" class="block text-sm font-medium text-gray-700"> Faça upload da
                                imagem
                            </label>

                            <div class="mt-1">
                                <input type="file" id="image" wire:model="ficheiroImagem" name="image"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('image')
                                <span class="text-red-400 ">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div x-show="tab === '3D'">
                        <h3>Modelo 3D</h3>


                        <div class="sm:col-span-6 mt-4">
                            <label for="modelo3d" class="block text-sm font-medium text-gray-700"> Faça upload do
                                modelo 3D em formato .glb
                            </label>

                            <div class="mt-1">
                                <input type="file" id="modelo3d" wire:model="modelo3d" name="modelo3d"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('modelo3d')
                                <span class="text-red-400 ">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="sm:col-span-6 mt-4">
                            <label for="image" class="block text-sm font-medium text-gray-700"> Faça upload da
                                imagem
                            </label>

                            <div class="mt-1">
                                <input type="file" id="image" wire:model="ficheiroImagem" name="image"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('image')
                                <span class="text-red-400 ">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- content -->

                </div>

                {{-- Desc --}}
                <div class="sm:col-span-6 pt-5">
                    <label for="projeto.obs" class="block text-sm font-medium text-gray-700">Descrição</label>
                    <div class="mt-1">
                        <textarea id="projeto.obs" rows="3" wire:model.lazy="projeto.obs"
                            class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border  py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>
                    @error('projeto.obs')
                        <span class="text-red-400 ">{{ $message }}</span>
                    @enderror
                </div>





            </form>



        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingProjetoAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="addProjeto()" wire:loading.attr="disabled">
                {{ __('Adicionar') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
