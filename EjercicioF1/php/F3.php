<?php
class F3 extends Monoplaza{
    protected String $nombreAcademia;

    public function __construct(String $nombrePiloto, String $nacionalidad, int $numMonoplaza, String $escuderia, int $cantidadPuntos, String $nombreAcademia){
        parent::__construct($nombrePiloto, $nacionalidad, $numMonoplaza, $escuderia, $cantidadPuntos);
        $this->nombreAcademia=$nombreAcademia;
    }

    //MÉTODOS
    public function otorgarPuntos(int $posicion, bool $vueltaRapida){
        $tablaPuntos=[10,8,7,6,5,4,3,2,1];
        $puntosGanados=0;

        if($posicion>=1 && $posicion<=9){
            $puntosGanados=$tablaPuntos[$posicion-1];
        }

        $this->cantidadPuntos+=$puntosGanados;

        echo "{$this->nombrePiloto} ha ganado {$puntosGanados} puntos. Total: {$this->cantidadPuntos}";
    }

    //(?bool $minimoPuntos=null) significa que el valor puede ser tanto booleano como null
    public function subirCategoria(?bool $minimoPuntos=null){
        //Si es null muestra un mensaje de error
        if ($minimoPuntos==null) {
            throw new InvalidArgumentException("Se necesita un dato para subir a F4");
        }

        return new F2(
            $this->nombrePiloto,
            $this->nacionalidad,
            $this->numMonoplaza,
            $this->escuderia,
            $this->cantidadPuntos,
            $minimoPuntos
        );
    }
}
?>