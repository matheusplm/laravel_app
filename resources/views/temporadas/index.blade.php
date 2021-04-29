@extends('layout')

@section('cabecalho')
Temporadas de {{$serie->nome}}
@endsection

@section('conteudo')
<ul calss="list-group" style="padding-inline-start: 0">
    @foreach($temporadas as $temporada)
        <li class="list-group-item mb-1">
            <div>
                <div class="title-section">
                    <a href="">
                        Temporada {{$temporada->numero}}
                    </a>
                </div>
                <div>
                    <ul calss="list-group">
                        @foreach($temporada->episodio as $ep)
                            <li class="list-group-item">
                                Episodio: {{$ep->numero}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </li>
    @endforeach
</ul>
@endsection