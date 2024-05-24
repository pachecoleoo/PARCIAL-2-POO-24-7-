<?php

//herencia 



include_once 'Partido.php';

class Fotbool extends Partido
{
    public function __construct($idpartido, $fecha, object $objEquipo1, $cantGolesE1, object $objEquipo2, $cantGolesE2)
    {
        parent::__construct($idpartido, $fecha,  $objEquipo1, $cantGolesE1,  $objEquipo2, $cantGolesE2);
    }

    // Si se trata de un partido de fútbol, se deben gestionar el valor de 3 coeficientes que serán aplicados según la categoría del partido (coef_Menores,coef_juveniles,coef_Mayores) .  A continuación se presenta una tabla en la que se detalla los valores por defecto de cada  coeficiente aplicado a una categoría de un partido  fútbol: 

    // Categoría de los equipos
    // Coef_Menores
    // Coef_juveniles
    // Coef_Mayores
    // 0,13
    // 0,19
    // 0,27
    public function coeficienteBase()
    {
        $coeficiente = parent::coeficienteBase();
        $coefOriginal = $coeficiente * 2;
        $equipo1 = $this->getObjEquipo1();
        $equipo2 = $this->getObjEquipo2();
        $categoriaE1 =  $equipo1->getObjCategoria()->getDescripcion();
        $categoriaE2 = $equipo2->getObjCategoria()->getDescripcion();

        if ($categoriaE1 == "Mayores") {
            $coeficiente = $coefOriginal * 0.13;
        } elseif ($categoriaE1 == "Menores") {
            $coeficiente = $coefOriginal * 0.19;
        } elseif ($categoriaE1 == "Juveniles") {
            $coeficiente = $coefOriginal * 0.17;
        }

        return $coeficiente;
    }
    public function __toString()
    {
        $cadena = "";
        $cadena .= parent::__toString();
        $cadena .= "El coeficiente del Partido de Football es: " . $this->coeficienteBase();

        return $cadena;
    }
}
