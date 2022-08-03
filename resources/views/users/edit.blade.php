<x-app-layout>
    <div class="mt-6 ">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <form class="w-full max-w-lg">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Nome do user
                </label>
                <div class="p-2 bg-white border shadow rounded w-96">
                    <div class="ml-2">{{ $user->name }}</div>
            </form>
        </div>

        <p class="text-xl m-3">Lista dos Roles</p>

        {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}

        @foreach ($roles as $role)
            <div>
                <label>{!! Form::checkbox('roles[]', $role->id, null, ['class' => 'm-4']) !!}</label>
                {{ $role->name }}
            </div>
        @endforeach

        {!! Form::submit('Confirmar Roles', [
            'class' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded',
        ]) !!}
        {!! Form::close() !!}
    </div>

</x-app-layout>
