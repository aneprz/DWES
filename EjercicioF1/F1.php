<?php
class F1 extends Monoplaza{
    protected String $nombrePatrocinador;

    public function __construct(String $nombrePiloto, String $nacionalidad, int $numMonoplaza, String $escuderia, int $cantidadPuntos, String $nombrePatrocinador){
        parent::__construct($nombrePiloto, $nacionalidad, $numMonoplaza, $escuderia, $cantidadPuntos);
        $this->nombrePatrocinador=$nombrePatrocinador;
    }

    //MÉTODOS
    public function otorgarPuntos(int $posicion, bool $vueltaRapida){
        $tablaPuntos=[25, 18, 15, 12, 10, 8, 6, 4, 2, 1];
        $puntosGanados=0;

        if($posicion>=1 && $posicion<=10){
            $puntosGanados=$tablaPuntos[$posicion-1];
        }

        if($vueltaRapida && $posicion<=10){
            $puntosGanados=$puntosGanados+1;
        }

        $this->cantidadPuntos+=$puntosGanados;

        echo "{$this->nombrePiloto} ha ganado {$puntosGanados} puntos. Total: {$this->cantidadPuntos}";
    }

    public function subirCategoria(){
        echo "El piloto ya está en la máxima categoría (F1).";
    }
}
?>