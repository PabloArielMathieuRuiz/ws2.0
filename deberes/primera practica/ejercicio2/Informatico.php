<?php

require_once "Persona.php";


class Informatico extends Persona {

public $lenguajes;
public $experienciaProgramador;


public function __construct($nombre = "", $apellido = "", $altura = 0.0, $edad = 0, $lenguajes = "",$experienciaProgramador = "" ) {
    parent::__construct($nombre, $apellido, $altura, $edad);
    $this->lenguajes = $lenguajes;
    $this->experienciaProgramador = $experienciaProgramador;

}


function programar(){

    return "esta programando";
}

function repararOrdenador(){
    return "esta reparando ordenador";
}


function hacerOfimática(){
    return "esta haciendo ofimatica";
}


// getters

function getLenguajes(){
    return $this->lenguajes;
}

function getExperienciaProgramador(){
    return $this->experienciaProgramador;
}

// setters

function setlenguajes($lenguajes){
    $this->lenguajes = $lenguajes;

}
function setExperienciaProgramador($experienciaProgramador){
    $this->experienciaProgramador = $experienciaProgramador;

}

}