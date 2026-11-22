<?php

class Coche {
    public $color = "Rojo";
    public $marca = "Ferrari";
    public $modelo = "Aventador";
    public $velocidad = 300;
    public $caballaje = 500;
    public $plazas = 2;

    // Aumentar y disminuir velocidad
    public function aumentarVelocidad(int $cantidad) {
        $this->velocidad += $cantidad;
    }

    public function reducirVelocidad(int $cantidad) {
        $this->velocidad -= $cantidad;

        if ($this->velocidad < 0) {
            $this->velocidad = 0;
        }       
    }

    public function obtenerVelocidad() {
        return $this->velocidad;
    }

    // Mostrar información (usando $this para evitar pasar el objeto por parámetro)
    public function mostrarInformacion() {
        echo "<h2>Información del Coche</h2>";
        echo "Marca: " . $this->getMarca() . "<br>";
        echo "Modelo: " . $this->getModelo() . "<br>";
        echo "Color: " . $this->getColor() . "<br>";
        echo "Velocidad actual: " . $this->getVelocidad() . " km/h<br>";
        echo "Caballaje: " . $this->getCaballaje() . " CV<br>";
        echo "Plazas: " . $this->getPlazas() . "<br>";
    }

    // --- GETTERS ---
    public function getColor() {
        return $this->color;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getVelocidad() {
        return $this->velocidad;
    }

    public function getCaballaje() {
        return $this->caballaje;
    }

    public function getPlazas() {
        return $this->plazas;
    }

    // --- SETTERS ---
    public function setColor($color) {
        $this->color = $color;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setVelocidad($velocidad) {
        $this->velocidad = $velocidad;
    }

    public function setCaballaje($caballaje) {
        $this->caballaje = $caballaje;
    }

    public function setPlazas($plazas) {
        $this->plazas = $plazas;
    }
}