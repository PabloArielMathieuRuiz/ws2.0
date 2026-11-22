<?php

require_once "Informatico.php";

class TecnicoRedes extends Informatico{

public $AuditarRedes;

public $ExpienciaRedes;

public function __construct($nombre = "", $apellido = "", $altura = 0.0, $edad = 0, $lenguajes = "",$experienciaProgramador = "", $AuditarRedes = "" , $ExpienciaRedes = "") {
parent::__construct($nombre, $apellido, $altura, $edad, $lenguajes, $experienciaProgramador);
$this->AuditarRedes = $AuditarRedes;
$this->ExpienciaRedes = $ExpienciaRedes;

}


function auditarRedes (){

    return "Esta auditando redes";

}





function getAuditarRedes(){

    return $this->AuditarRedes;
}


function getExpienciaRedes(){

    return $this->ExpienciaRedes;
}



function setAuditarRedes($AuditarRedes){

    $this->AuditarRedes = $AuditarRedes;

    
}

function setExpienciaRedes($ExpienciaRedes){

    $this->ExpienciaRedes = $ExpienciaRedes;

    
}
}


