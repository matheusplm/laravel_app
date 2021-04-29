<?php
namespace App\Services;

use App\{Serie,Temporada,Episodio};
use Illuminate\Support\Facades\DB;

class SerieCreate{
    public function SerieCreate(string $nome, int $qntTemp,int $qntEp): Serie{

        DB::beginTransaction();

        $serie = Serie::create(['nome'=>$nome]);

        for($i=1;$i<=$qntTemp;$i++){
            $this->TempCreate($serie,$qntEp,$i);
        }
        
        DB::commit();
        
        return $serie;
    }

    public function TempCreate(Serie $serie,int $qntEp,int $temp){
        DB::beginTransaction();

        $temporada = $serie->temporadas()->create(['numero'=>$temp]);
        for($j=1;$j<=$qntEp;$j++){
            $this->EpCreate($temporada,$j);
        }

        DB::commit();
    }

    public function EpCreate(Temporada $temporada,int $ep){
        $temporada->episodio()->create(['numero'=>$ep]);
    }
}    