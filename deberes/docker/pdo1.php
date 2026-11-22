<?php
header("Content-Type: application/json");  
echo "Hola";
try {
    $pdo = new PDO("mysql:hostname=127.0.0.1;port=3306;dbname=colegio;charset=utf8","root", "");

} catch( PDOException $e){

    echo json_encode([
        "success" => false,
        "mesage" => $e->getMessage()

    ]);


}

// 1. Lanzar una query

$query = $pdo->query("SELECT * FROM alumno");

// 2. Recojer los resultados

$alumnos = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "success" => true,
    "mesage" => "Alumnos obtenidos correctamente",
    "data" => $alumnos


]);
