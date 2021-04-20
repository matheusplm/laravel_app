<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use Illuminate\Http\Request;
use App\Teste;
use App\Serie;

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

    public function store(SeriesFormRequest $request){

        // if(!isset($request->nome)){
        //     return redirect()->route('criar_serie');
        // }
        
        //$nome = $request->nome;
        $serie = Serie::create($request->all());
        $request->session()->flash('message',"Série {$serie->nome} cadastrada.");
        // $serie = new Serie();
        // $serie->nome = $nome;
        return redirect('/series');
    }

    public function remove(Request $request){
        $request->session()->flash('message',"Série excluida.");
        
        Serie::destroy($request->id);

        return redirect('/series');
    }
}