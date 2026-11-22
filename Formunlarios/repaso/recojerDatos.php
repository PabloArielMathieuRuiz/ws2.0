<?php

echo "hola";

$array = ["Lunes", "Martes"];


$datos = [
    "nombre" => "juan",
    "apellidos" => "martinez",

];



if (!empty($_POST['name'])){
    echo $_POST["name"] . " ";


}
echo $_POST["surname"] . " ";
echo $_POST["accept"] . " ";

// isset -> te dice si una propiedad exisce
// empty -> si existe y comprueva que no sea null, false, ni "", ni falsy (!truthy)
// 0 = a falsy cuando no puede cojer un booleano


// ?? 

$accept = $_POST['accept'] ?? false;

if ($accept){

echo $accept;
}


if (isset($_POST['sex'])){
    echo $_POST["sex"]. " ";
 
}