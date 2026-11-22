<?php

require "../vendor/autoload.php";

use

include_once "./Perro.php";
include_once "./Vaca.php";

$perro = new Perro("Manolo", 4, false);
$perro->patas = 4;
echo $perro->nombre;

$vaca = new Vaca("Pepa", 4, false);
$vaca->patas = 4;
echo $vaca->nombre;