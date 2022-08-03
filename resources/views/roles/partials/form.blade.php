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
