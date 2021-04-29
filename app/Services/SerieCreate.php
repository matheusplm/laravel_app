<?php
namespace App\Services;

use App\{Serie,Temporada,Episodio};

class SerieCreate{
    public function SerieCreate(string $nome, int $qntTemp,int $qntEp): Serie{
        $serie = Serie::create(['nome'=>$nome]);

        for($i=1;$i<=$qntTemp;$i++){
            $temporada = $serie->temporadas()->create(['numero'=>$i]);

            for($j=1;$j<=$qntEp;$j++){
                $temporada->episodio()->create(['numero'=>$j]);
            }
        }

        return $serie;
    }
}    