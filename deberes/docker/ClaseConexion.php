<?php
require_once "pdoPreparada.php";

class ClaseConexion{
private const HOST = "mariadb";
private const PORT = "3306";
private const DBNAME = "colegio";
private const USER = "root";
private const PASS = "root";



public static function conectar() {
        try {
            $dsn = "mysql:host=" . self::HOST . ";port=" . self::PORT . ";dbname=" . self::DBNAME . ";charset=utf8";
            
            $pdo = new PDO($dsn, self::USER, self::PASS);
            
            // Configurar PDO para que lance excepciones en caso de error
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $pdo;
            
        } catch (PDOException $e) {
            // Si falla la conexión, devolvemos el JSON de error y detenemos el script
            self::jsonRespuesta(false, "Error de conexión: " . $e->getMessage());
        }
    }



function jsonRespuesta ($success, $message){
    echo json_encode([
        "success" => $success,
        "message" => $message,
    ]);
    die;
}

}