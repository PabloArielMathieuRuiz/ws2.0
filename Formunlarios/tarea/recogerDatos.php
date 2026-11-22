<?php
// name
if (!empty($_GET['name'])){
    echo $_GET["name"] . " ";


}
// surname
if (!empty($_GET['surname'])){
    echo $_GET["surname"] . " ";


}


//password

$password = $_GET['password'] ?? false;

if ($password){

echo $password;
}


//telefono

if (!empty($_GET['telefono'])){
    echo $_GET["telefono"] . " ";


}

//email

if (!empty($_GET['email'])){
    $correo = $_GET['email'];

    if (filter_var($correo, FILTER_VALIDATE_EMAIL)){
        echo $_GET["email"] . " ";
    }
    else{

    echo "El email no es valido";


    }

}

//sex

if (isset($_GET['sex'])){
    echo $_GET["sex"]. " ";
 
}

// recive un objeto de php o un arrat asociativo y devielve un JSON

$response = [
    "success" => true, //el resultado de la operacion "success" bien -> true | mail -> false
    "message" => "Usuario creado correctamente",
    "data" => $_GET


];


header("Content-Type: application/json"); // indica al cliente que el contenido de la respuesta en un json

echo json_encode($response);