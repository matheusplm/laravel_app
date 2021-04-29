@extends('layout')

@section('cabecalho')
Adicionar Série
@endsection

@section('conteudo')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>

        <div class="col col-2">
            <label for="temporadas">Nº de Temporadas</label>
            <input type="number" name="temporadas" id="temporadas" class="form-control">
        </div>

        <div class="col col-2">
            <label for="episodios">Ep. por Temporada</label>
            <input type="number" name="episodios" id="episodios" class="form-control">
        </div>
    </div>
    <button class="btn btn-primary mt-3">Adicionar</button>
</form>
@endsection