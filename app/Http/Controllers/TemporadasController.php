<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $serieid){
        $serie = Serie::find($serieid);
        $temporadas = $serie->temporadas;

        return view('temporadas.index',compact('temporadas','serie'));
    }
}
