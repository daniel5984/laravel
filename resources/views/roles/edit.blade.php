<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Role') }}
        </h2>
    </x-slot>

    <div class="mt-4 p-6 sm:px-20 bg-white border-b border-gray-200">


        @if (session('info'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ session('info') }} </strong>

            </div>
        @endif

        {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put']) !!}

        {!! Form::label('name', 'Nome') !!}
        {!! Form::text('name', null, ['class' => 'form-input mt-1 block ', 'placeholder' => 'Introduza o nome da role']) !!}

        @error('name')
            <p class="text-red-500 text-xs italic"></p>
        @enderror
        <p class="text-xl m-3">Lista dos Permissões</p>


        @foreach ($permissions as $item)
            <div>
                <label>
                    {!! Form::checkbox('permissions[]', $item->id, null, ['class' => 'form-checkbox text-indigo-600']) !!}
                    {{ $item->name }}
                </label>
            </div>
        @endforeach


        {!! Form::submit('Atualizar Role', [
            'class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded',
        ]) !!}

        {!! Form::close() !!}


    </div>

</x-app-layout>
