<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista das Roles') }}
        </h2>
    </x-slot>

    <div class="mt-6  ">


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('info'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">{{ session('info') }} </strong>

                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class='p-4 float-right'>
                    <x-link href="{{ route('roles.create') }}" class="m-0  py-4">Criar</x-link>
                </div>


                <div class="flex justify-between ">
                    {{-- @can('manage tasks') --}}

                    {{-- <x-link href="{{ route('users.create') }}" class="m-0 py-4">Criar</x-link> --}}


                    {{-- @endcan --}}
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th scope="col" class="px-4 py-2">

                                    <div class="flex items-center"> Nome</div>
                                </th>

                                {{-- @can('manage tasks') --}}
                                <th scope="col" class="px-4 py-2">

                                    <div class="flex items-center"> Ações</div>
                                </th>
                                {{-- @endcan --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $item)
                                <tr>
                                    <td class="border px-4 py-2">
                                        {{ $item->name }}
                                    </td>

                                    {{-- <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        Se existir roles para o user Mostrar as roles snão 'No Roles' 
                                        @forelse ($item->getRoleNames() as $role)
                                            {{ $role }}
                                        @empty
                                            No Roles
                                        @endforelse
                                    </td>


                                    {{-- @can('manage tasks') --}}
                                    <td class="border px-4 py-2">
                                        <x-link href="{{ route('roles.edit', $item) }}">Edit</x-link>

                                        <form method="POST" action="{{ route('roles.destroy', $item) }}"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <x-jet-danger-button type="submit"
                                                onclick="return confirm('Are you sure?')">Delete</x-jet-danger-button>
                                        </form>
                                    </td>

                                    {{-- @endcan --}}
                                </tr>
                            @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td colspan="2"
                                        class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ __('No tasks found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-4">
            {{ $roles->links() }}
        </div>


    </div>
</x-app-layout>
