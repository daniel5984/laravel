@extends('layouts.main')

@section('content')
@section('title','Pagina inicial')
<h3>Este é a pagina inicial v2</h3>

@foreach($jcgm as $parametro)





<p>{{$parametro->ano}} -- Data inicial: {{$parametro->data_inicial}} -- Data final: {{$parametro->data_final}}</p>
@endforeach
@endsection
