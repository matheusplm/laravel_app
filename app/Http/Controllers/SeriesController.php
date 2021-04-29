<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use Illuminate\Http\Request;
use App\{Teste,Serie};
use App\Services\{SerieCreate,SerieRemove};

class SeriesController extends Controller{
    public function index(Request $request){
        $series = Serie::query()->orderBy('nome')->get();

        $message = $request->session()->get('message');
        //$request->session()->remove('message');

        //carregando a view index, mandando a variavel series
        return view('series.index',compact('series','message'));
    }

    public function create(){
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, SerieCreate $serieCreate){
        $serie = $serieCreate->SerieCreate(
            $request->nome,
            $request->temporadas,
            $request->episodios
        );

        $request->session()->flash('message',"Série {$serie->nome} cadastrada.");
        return redirect('/series');
    }

    public function remove(Request $request, SerieRemove $serieRemove){
        $request->session()->flash('message',"Série excluida.");

        $serieRemove->SerieRemove($request->id);

        return redirect('/series');
    }

    public function editNome(Request $request){
        $newName = $request->nome;
        $serie = Serie::find($request->serieid);

        if(strlen($newName)>2){
            $serie->nome = $newName;
            $serie->save();
        }
    }
}