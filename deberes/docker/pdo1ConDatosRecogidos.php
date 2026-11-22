<?php
header("Content-Type: application/json");  
echo "Hola";
try {

    // TODO: A una clase "conexion" y los parametros constantes
    $pdo = new PDO("mysql:hostname=127.0.0.1;port=3306;dbname=colegio;charset=utf8","root", "");

} catch( PDOException $e){

    // A una fuincion/CLase response
    echo json_encode([
        "success" => false,
        "mesage" => $e->getMessage()

    ]);


}

// 1. Recojer los datos de una asignatura recibidos por post
$name = $_POST['name'] ?? "";

if ($name === ""){

// TOFO: devolver error
}

//TODO: 1.1 conprovar wue no exist la asignatura ya en la base de datos

// 2. Insertar la asignatura

$pdo->query("INSERT INTO asignatura (nombre) VALUES (\"$name\") "); // las contrabarra es para que tome las comillas // 3. Devolver todas las asignaturas
$query = $pdo->query("SELECT * FROM asignatura");                   //como algo para escribir no para abrir y cerrar el string


$asignatura = $query->fetchAll(PDO::FETCH_ASSOC);

// TODO: 4. mostrar las asignaturas en JSON



