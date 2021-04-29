@extends('layout')

@section('cabecalho')
Temporadas de {{$serie->nome}}
@endsection

@section('conteudo')
<ul calss="list-group" style="padding-inline-start: 0">
    @foreach($temporadas as $temporada)
        <li class="list-group-item">
            Temporada {{$temporada->numero}}
        </li>
    @endforeach
</ul>
@endsection