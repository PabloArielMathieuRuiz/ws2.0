<?php

require_once "TecnicoRedes.php";

$tecnico = new TecnicoRedes();



$tecnico->setNombre("Pablo");
$tecnico->setApellido("Ariel");
$tecnico->setAltura(1.70);
$tecnico->setEdad(19);

$tecnico->setlenguajes(["JS", "HTML", "PHP"]);
$tecnico->setExperienciaProgramador(3);

$tecnico->setAuditarRedes(false);
$tecnico->setExpienciaRedes(3);

echo "Pruebas <br><br>";

echo "TecnicoRedes: <br>";
echo $tecnico->auditarRedes() . "<br><br>";


echo "Informatico: <br>";
echo $tecnico->repararOrdenador() . "<br><br>";
echo $tecnico->programar() . "<br><br>";
echo $tecnico->hacerOfimática() . "<br><br>";


echo "Persona: <br>";
echo $tecnico->caminar() . "<br><br>";
echo $tecnico->hablar() . "<br><br>";



