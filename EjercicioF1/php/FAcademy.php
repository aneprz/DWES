<?php
class FAcademy extends Monoplaza{
    protected float $potenciaMaxima;
    
    public function __construct(String $nombrePiloto, String $nacionalidad, int $numMonoplaza, String $escuderia, int $cantidadPuntos, float $potenciaMaxima){
        parent::__construct($nombrePiloto, $nacionalidad, $numMonoplaza, $escuderia, $cantidadPuntos);
        $this->potenciaMaxima=$potenciaMaxima;
    }    

    //MÉTODOS
    public function otorgarPuntos(int $posicion, bool $vueltaRapida){
        $tablaPuntos=[18,15,12,10,8,6,4,2,1];
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

    //(?String $pais=null) significa que el valor puede ser tanto un String como null
    public function subirCategoria(?String $pais=null){
        //Si es null muestra un mensaje de error
        if ($pais==null) {
            throw new InvalidArgumentException("Se necesita un dato para subir a F4");
        }

        return new F4(
            $this->nombrePiloto,
            $this->nacionalidad,
            $this->numMonoplaza,
            $this->escuderia,
            $this->cantidadPuntos,
            $pais
        );
    }

}
?>