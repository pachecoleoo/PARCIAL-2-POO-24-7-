<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("Fotbool.php");
include_once("Basket.php");
include_once("Torneo.php");

$catMayores = new Categoria(1, 'Mayores');
$catJuveniles = new Categoria(2, 'juveniles');
$catMenores = new Categoria(1, 'Menores');

$objE1 = new Equipo("Equipo Uno", "Cap.Uno", 1, $catMayores);
$objE2 = new Equipo("Equipo Dos", "Cap.Dos", 2, $catMayores);

$objE3 = new Equipo("Equipo Tres", "Cap.Tres", 3, $catJuveniles);
$objE4 = new Equipo("Equipo Cuatro", "Cap.Cuatro", 4, $catJuveniles);

$objE5 = new Equipo("Equipo Cinco", "Cap.Cinco", 5, $catMayores);
$objE6 = new Equipo("Equipo Seis", "Cap.Seis", 6, $catMayores);

$objE7 = new Equipo("Equipo Siete", "Cap.Siete", 7, $catJuveniles);
$objE8 = new Equipo("Equipo Ocho", "Cap.Ocho", 8, $catJuveniles);

$objE9 = new Equipo("Equipo Nueve", "Cap.Nueve", 9, $catMenores);
$objE10 = new Equipo("Equipo Diez", "Cap.Diez", 9, $catMenores);

$objE11 = new Equipo("Equipo Once", "Cap.Once", 11, $catMayores);
$objE12 = new Equipo("Equipo Doce", "Cap.Doce", 11, $catMayores);
// Crear un objeto de la clase Torneo donde el importe base del premio es de: 100.000. 

$torneo = new Torneo(100000);
// crear 3 objetos partidos de Básquet  con la siguiente información:
$basket1 = new Basket(11, 2024 - 05 - 05, $objE7, 80, $objE8, 120, 7);
$basket2 = new Basket(12, 2024 - 05 - 06, $objE9, 81, $objE10, 110, 8,);
$basket3 = new Basket(13, 2024 - 05 - 07, $objE11, 115, $objE12, 85, 9);

// Crear 3 objetos partidos de Fútbol con la siguiente información
$football1 = new Fotbool(14, 2024 - 05 - 07, $objE1, $objE2, 2);


$football2 = new Fotbool(14, 2024 - 05 - 07, $objE1, $objE2, 2);

// Completar el script testTorneo.php para invocar al método : 
// ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol'); visualizar la respuesta y la cantidad de equipos del torneo.
// ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol') ; visualizar la respuesta y la cantidad de equipos del torneo.
// ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol'); visualizar la respuesta y la cantidad de equipos del torneo.
// darGanadores(‘basquet’) y visualizar el resultado.
// darGanadores(‘futbol’) y visualizar el resultado.
// calcularPremioPartido con cada uno de los partidos obtenidos en a,b,c.
// Realizar un echo del objeto  Torneo creado en (1).
