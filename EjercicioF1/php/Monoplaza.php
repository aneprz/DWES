<?php
class Monoplaza{
    protected String $nombrePiloto;
    protected String $nacionalidad;
    protected int $numMonoplaza;
    protected String $escuderia;
    protected int $cantidadPuntos;

    //CONTRUCTOR
    public function __construct(String $nombrePiloto, String $nacionalidad, int $numMonoplaza, String $escuderia, int $cantidadPuntos){
        $this->$nombrePiloto=$nombrePiloto;
        $this->$nacionalidad=$nacionalidad;
        $this->$numMonoplaza=$numMonoplaza;
        $this->$escuderia=$escuderia;
        $this->$cantidadPuntos=$cantidadPuntos;
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

    public function posicionValida(int $num){
        if ($num<1 && $num>22) {
            return "Posición inválida";
        } else{
            return "Posición válida";
        }
    }

    public function subirCategoria(){
        echo "Este monoplaza no puede subir de categoría.";
        return $this;
    }
}
?>