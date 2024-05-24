<?php
// Realizar las siguientes implementaciones:
// Implementar la clase Torneo que contiene la colección de partidos y un importe que será parte del premio. Cuando un Torneo es creado la colección de partidos debe ser creada como una colección vacía🟢
// Implementar la jerarquía de herencia que crea necesaria para modelar los Partidos.🟢
// Implementar en la clase Partido el método darEquipoGanador() que retorna el equipo ganador de un partido (equipo con mayor cantidad de goles del partido), en caso de empate debe retornar a los dos equipos.🟢
// Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) en la  clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se trata de un partido de futbol o basquetbol . El método debe crear y retornar la instancia de la clase Partido que corresponda y almacenarla en la colección de partidos del Torneo. Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser registrado ese partido en el torneo. 🟢 




class Torneo
{
    private $importe;
    private $colPartidos;

    public function __construct($importe)
    {
        $this->importe = $importe;
        $this->colPartidos = [];
    }

    public function setImporte($importe)
    {
        $this->importe = $importe;
    }
    public function getImporte()
    {
        return $this->importe;
    }
    public function setColPartidos($colPartidos)
    {
        $this->colPartidos = $colPartidos;
    }
    public function GetColPartidos()
    {
        return $this->colPartidos;
    }


    // Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) en la  clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se trata de un partido de futbol o basquetbol . El método debe crear y retornar la instancia de la clase Partido que corresponda y almacenarla en la colección de partidos del Torneo. Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser registrado ese partido en el torneo. 🟢

    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido)
    {
        $numPartidos  = count($this->GetColPartidos());
        $jugadores1 = $OBJEquipo1->getCantJugadores();
        $jugadores2 = $OBJEquipo2->getCantJugadores();
        $categoria1 = $OBJEquipo1->getObjCategoria()->getDescripcion();
        $categoria2 = $OBJEquipo2->getObjCategoria()->getDescripcion();
        if ($jugadores1 == $jugadores2 &&  $categoria1 == $categoria2) {
            if ($tipoPartido == "Basket") {
                $partido = new Basket($numPartidos, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0, 0);
                $partidos = $this->GetColPartidos();
                $partidos[] = $partido;
            } elseif ($tipoPartido == "Fotbool") {
                $partido = new Fotbool($numPartidos, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0);
                $partidos = $this->GetColPartidos();
                $partidos[] = $partido;
            }
        }

        $this->conversionArray($partido);
        return $partido;
    }
    // Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se trata de un partido de fútbol o de básquetbol y en  base  al parámetro busca entre esos partidos los equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los objetos de los equipos encontrados.
    public function darGanadores($deporte)
    {
        $partidos = $this->GetColPartidos();
        $ganadores = [];
        foreach ($partidos as $partido) {

            if ($deporte == "Basket" && $partido instanceof Basket) {
                $ganadores[] = $partido->darEquipoGanador();
            } elseif ($deporte == "Fotbool" && $partido instanceof Fotbool) {
                $ganadores[] = $partido->darEquipoGanador();
            }
        }
        $this->conversionArray($ganadores);
        return $ganadores;
    }

    public function conversionArray($array)
    {
        $lista = "";
        foreach ($array as $atributo) {
            $lista .= $atributo . "\n";
        }

        return $lista;
    }
    // Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo asociativo donde una de sus claves es ‘equipoGanador’  y contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado para el torneo. 
    // (premioPartido = Coef_partido * ImportePremio)


    public function calcularPremioPartido($OBJPartido)
    {
        $equipoGanador = $OBJPartido->darEquipoGanador();
        $premioPartido = $this->getImporte() * $OBJPartido->coeficienteBase();
        $resultado = [
            'equipoGanador' => $equipoGanador,
            'premioPartido' => $premioPartido
        ];

        return $resultado;
    }

    public function __toString()
    {
        $cadena = "";
        $cadena .= "Premio de: $" . $this->getImporte() . "\n";
        $cadena .= "Coleccion de partidos: " . $this->conversionArray($this->GetColPartidos());
    }
}
