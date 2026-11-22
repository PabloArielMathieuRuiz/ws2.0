<?php

header("Content-Type: application/json");

$pdo = null;
try {
// TODO: A una clase "Conexión" y los parametros en constantes
$pdo = new PDO("mysql:host=mariadb;port=3306;dbname=colegio;charset=utf8", "root", "root");
} catch (PDOException $e) {

//TODO: A una función/Clase Response

jsonRespuesta(false, $e->getMessage());
}


// 1. Recoger los datos de una asignatura recibidos por POST y validarlos
$name = $_POST['name'] ?? "";

if ($name === "") {


jsonRespuesta(false, "El nombre de la asigntura es obligatorio.");
}   

// comprobacion de que la asignatura exista en la base de datos
$check = $pdo->prepare("SELECT COUNT(*) FROM asignatura WHERE nombre = :elNombre");
$check->bindParam(":elNombre", $name);
$check->execute();
$existe = $check->fetchColumn();

// mensaje de error en caso de que la asignatura exista en la base de datos
if ($existe>0){

    jsonRespuesta(false, "La asignatura ya existe en la base de datos.");   
}



// 2. Insertar la asignatura
// INSERT INTO asignatura (nombre) VALUES ("reyryure"); DROP DATABASE colegio"")
$query = $pdo->prepare("INSERT INTO asignatura (nombre) VALUES (:elNombre) ");

// Sanitizar -> Escapar los caracteres especiales (" -> \")
$query->bindParam(":elNombre", $name);

// Ejecuta la consulta
$query->execute();


// 3. Devolver todas las asignaturas
$query = $pdo->query("SELECT * FROM asignatura");
$asignaturas = $query->fetchAll(PDO::FETCH_ASSOC);

//4. Mostrar las asignaturas en JSON
print_r($asignaturas);


jsonRespuesta(true, $asignaturas);

function jsonRespuesta ($success, $message){
    echo json_encode([
        "success" => $success,
        "message" => $message,
    ]);
    die;
}
