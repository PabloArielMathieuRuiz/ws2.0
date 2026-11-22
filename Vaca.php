<?php

include "./Mamifero.php";



class Perro extends Mamifero{

    public string  $nombre;
    public int  $edad;
    public bool $tieneChip;

    function __construct(string $nombre, int $edad, bool $tieneChip) 
    {

        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->tieneChip = $tieneChip;
    }

    public function ladrar (){

        return "mooo mooo";

    }
}

