<?php
class F4 extends Monoplaza{
    protected String $pais;

    public function __construct(String $nombrePiloto, String $nacionalidad, int $numMonoplaza, String $escuderia, int $cantidadPuntos, String $pais){
        parent::__construct($nombrePiloto, $nacionalidad, $numMonoplaza, $escuderia, $cantidadPuntos);
        $this->pais=$pais;
    }

    //MÉTODOS
    public function otorgarPuntos(int $posicion, bool $vueltaRapida){
        $tablaPuntos=[25, 18, 15, 12, 10, 8, 6, 4, 2, 1];
        $puntosGanados=0;

        if($posicion>=1 && $posicion<=10){
            $puntosGanados=$tablaPuntos[$posicion-1];
        }

        $this->cantidadPuntos+=$puntosGanados;

        echo "{$this->nombrePiloto} ha ganado {$puntosGanados} puntos. Total: {$this->cantidadPuntos}";
    }

    //(?String $nombreAcademia=null) significa que el valor puede ser tanto un String como null
    public function subirCategoria(?String $nombreAcademia=null){
        //Si es null muestra un mensaje de error
        if ($nombreAcademia==null) {
            throw new InvalidArgumentException("Se necesita un dato para subir a F4");
        }

        return new F3(
            $this->nombrePiloto,
            $this->nacionalidad,
            $this->numMonoplaza,
            $this->escuderia,
            $this->cantidadPuntos,
            $nombreAcademia
        );
    }
}
?>