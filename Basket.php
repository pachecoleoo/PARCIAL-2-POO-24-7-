<?php
include_once 'Partido.php';

// Por otro lado, si se trata de un partido de basquetbol  se almacena la cantidad de infracciones de manera tal que al coeficiente base se debe restar un coeficiente de penalización, cuyo valor por defecto es: 0.75, * (por) la cantidad de infracciones. Es decir:
// coef  = coeficiente_base_partido  - (coef_penalización*cant_infracciones);
class Basket extends Partido
{
    private $cantInfraccion;
    private $coefPenalizacion;
    public function __construct($idpartido, $fecha, object $objEquipo1, $cantGolesE1, object $objEquipo2, $cantGolesE2, $cantInfraccion)
    {
        parent::__construct($idpartido, $fecha,  $objEquipo1, $cantGolesE1,  $objEquipo2, $cantGolesE2);

        $this->cantInfraccion = $cantInfraccion;
        $this->coefPenalizacion =  0.75;
    }



    public function getCoefPenalizacion()
    {
        return $this->coefPenalizacion;
    }
    public function setCoefPenalizacion($coefPenalizacion)
    {
        $this->coefPenalizacion = $coefPenalizacion;
    }

    public function getCantInfraccion()
    {
        return $this->cantInfraccion;
    }
    public function setCantInfraccion($cantInfraccion)
    {
        $this->cantInfraccion = $cantInfraccion;
    }

    // Por otro lado, si se trata de un partido de basquetbol  se almacena la cantidad de infracciones de manera tal que al coeficiente base se debe restar un coeficiente de penalización, cuyo valor por defecto es: 0.75, * (por) la cantidad de infracciones. Es decir:
    // coef  = coeficiente_base_partido  - (coef_penalización*cant_infracciones);
    public function coeficienteBase()
    {
        $coeficienteBase = parent::coeficienteBase();
        $coef = $coeficienteBase - ($this->getCoefPenalizacion() * $this->getCantInfraccion());


        return $coef;
    }


    public function __toString()
    {
        $cadena = "";
        $cadena .= parent::__toString();
        $cadena .= "El coeficiente del Partido de Basquet es: " . $this->coeficienteBase();

        return $cadena;
    }
}
