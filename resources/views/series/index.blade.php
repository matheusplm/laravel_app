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
            <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

            <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                <input type="text" class="form-control" value="{{ $serie->nome }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>
            
            <span class="d-flex">
                <button class="btn btn-info btn-sm mr-2"
                    onclick="toggle({{$serie->id}})"
                >
                    <i class="fas fa-edit"></i>
                </button>
                <a href="/series/{{$serie->id}}/temporadas" class="btn btn-info btn-sm mr-2 p-2">
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
<script>
    function toggle(serieid){
        let input1 = document.querySelector(`#input-nome-serie-${serieid}`);
        let input2 = document.querySelector(`#nome-serie-${serieid}`);
        if(input1.hasAttribute('hidden')){
            input1.removeAttribute('hidden');
            input2.hidden = true;
        } else{
            input2.removeAttribute('hidden');
            input1.hidden = true;
        }
    }

    function editarSerie(serieid){
        let nome = document.querySelector(`#input-nome-serie-${serieid} > input`).value;
        if(nome.length>2){
            let token = document.querySelector('input[name="_token"]').value;
            let input = document.querySelector(`#nome-serie-${serieid}`);

            let formData = new FormData();
            formData.append('nome',nome);
            formData.append('_token',token);

            const url = `/series/${serieid}/editName`;
            fetch(url,{
                body: formData,
                method: 'POST'
            }).then(()=>{
                input.textContent = nome;
                toggle(serieid);
            });
        }else{
            alert('O nome da série não pode ser menor que 3.')
        }
    }
</script>
@endsection