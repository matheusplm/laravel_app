@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
@if(isset($message))
    <div class="alert alert-success">{{$message}}</div>
@endif

<a href="{{route('criar_serie')}}" class="btn btn-success mb-2"><i class="fas fa-plus-square"></i></a>

<ul calss="list-group" style="padding-inline-start: 0">
    @foreach($series as $serie)
        <li class="list-group-item p-3 d-flex justify-content-between">
            {{$serie->nome}}
            
            <span class="d-flex">
            <a href="/series/{{$serie->id}}/temporadas" class="btb btn-info btn-sm mr-2 p-2">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <form 
                    method="post" 
                    action="/series/{{$serie->id}}" 
                    onsubmit="return confirm('Excluir série {{addslashes($serie->nome)}}?')
                ">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </span>
        </li>
       
    @endforeach
</ul>
@endsection