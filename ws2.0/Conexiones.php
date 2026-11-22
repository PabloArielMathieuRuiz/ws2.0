<?php

class Conexion
{
    protected $conexionDb;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=colegio;charset=utf8';
        $this->conexionDb = new PDO($dsn, 'root', '');
        $this->conexionDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}