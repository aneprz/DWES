<?php
class F2 extends Monoplaza{
    protected bool $minimoPuntos;

    public function __construct(String $nombrePiloto, String $nacionalidad, int $numMonoplaza, String $escuderia, int $cantidadPuntos, bool $minimoPuntos){
        parent::__construct($nombrePiloto, $nacionalidad, $numMonoplaza, $escuderia, $cantidadPuntos);
        $this->minimoPuntos=$minimoPuntos;
    }    

    //MÉTODOS
    public function otorgarPuntos(int $posicion, bool $vueltaRapida){
        $tablaPuntos=[10,8,7,6,5,4,3,2,1];
        $puntosGanados=0;

        if($posicion>=1 && $posicion<=9){
            $puntosGanados=$tablaPuntos[$posicion-1];
        }

        if($vueltaRapida && $posicion<=9){
            $puntosGanados=$puntosGanados+1;
        }

        $this->cantidadPuntos+=$puntosGanados;

        echo "{$this->nombrePiloto} ha ganado {$puntosGanados} puntos. Total: {$this->cantidadPuntos}";
    }

    //(?String $nombrePatrocinador=null) significa que el valor puede ser tanto un String como null
    public function subirCategoria(?String $nombrePatrocinador=null){
        //Si es null muestra un mensaje de error
        if ($nombrePatrocinador==null) {
            throw new InvalidArgumentException("Se necesita un dato para subir a F4");
        }

        return new F1(
            $this->nombrePiloto,
            $this->nacionalidad,
            $this->numMonoplaza,
            $this->escuderia,
            $this->cantidadPuntos,
            $nombrePatrocinador
        );
    }

}
?>