<?php

class Persona{



public $nombre;
public $apellido;
public $altura;
public $edad;


public function __construct($nombre = "", $apellido = "", $altura = 0.0, $edad = 0) {
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->altura = $altura;
    $this->edad = $edad;
}


function hablar(){

    return "esta hablando";
}

function caminar(){
    return "esta caminado";
}








// getters
function getNombre(){
    return $this->nombre;

}
function getApellido(){
    return $this->apellido;
}
function getAltura(){
    return $this->altura;
}
function getEdad(){
    return $this->edad;
}

// setters

function setNombre($nombre){
    $this->nombre = $nombre;

}
function setApellido($apellido){
    $this->apellido = $apellido;
}
function setAltura($altura){
    $this->altura = $altura;
}
function setEdad($edad){
    $this->edad = $edad;
}



}