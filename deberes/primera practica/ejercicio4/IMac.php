<?php

require_once "InterfaceIMac.php";

class iMac implements iMacInterface {
    // Constante de la marca
    public const MARCA = "Apple";

    // Propiedades solicitadas
    public $Marca;
    public $software;
    public $pulgadas;

    // Constructor para inicializar los valores
    public function __construct($marca, $software, $pulgadas) {
        $this->Marca = $marca;
        $this->software = $software;
        $this->pulgadas = $pulgadas;
    }

    // Métodos obligatorios por la interfaz
    public function encender() {
        echo "El iMac de la marca " . self::MARCA . " se está encendiendo... ¡Sonido de inicio!<br>";
    }

    public function mostrarInfo() {
        echo "<h3>Información del iMac</h3>";
        echo "Marca general: " . $this->Marca . "<br>";
        echo "Sistema Operativo: " . $this->software . "<br>";
        echo "Pulgadas: " . $this->pulgadas . "<br>";
        echo "Constante de Marca (Clase): " . self::MARCA . "<br>";
    }
}