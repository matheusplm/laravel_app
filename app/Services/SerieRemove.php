<?php
namespace App\Services;

use App\{Serie,Temporada,Episodio};
use Illuminate\Support\Facades\DB;

class SerieRemove{
    public function SerieRemove(int $id):string{
        $return = "";
        DB::transaction(function() use (&$return,$id){
            $serie = Serie::find($id);
            $return = $serie->nome;
    
            $serie->temporadas->each(function ($temporada){
                $temporada->episodio->each(function($episodio){
                    $episodio->delete();
                });
                $temporada->delete();
            });
            Serie::destroy($id);
        });
        return $return;
    }
}