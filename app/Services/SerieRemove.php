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
                $this->TempRemove($temporada);
            });

            Serie::destroy($id);
        });
        return $return;
    }

    public function TempRemove(Temporada $temp){
        DB::transaction(function() use ($temp){
            $temp->episodio->each(function($episodio){
                $this->EpRemove($episodio);
            });
            $temp->delete();
        });
    }

    public function EpRemove(Episodio $ep){
        $ep->delete();
    }
}