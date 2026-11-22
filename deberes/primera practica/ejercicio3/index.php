<?php

require_once "Configuracion.php";

$configuracion = new Configuracion();

$configuracion->setColor("rojo");
$configuracion->setNewsletter("Hola mundo");
$configuracion->setEntorno("Produccion");



/*
- ¿Cómo hacemos referencia a esta clase?

utilizando el operador de resolución de ámbito "::"

un ejemplo en este caso seria "Configuracion::setEntorno('produccion');"

- ¿debemos instanciarla?
    No ya que al tratarse de una clase con metodos estatiocs todo pertenece 
    a la misma clase no a objetos por lo que el codigo de arriba esta mal
*/

echo "Errores realizados aposta". "<br><br>";

// Cargamos valores usando los setters estáticos
Configuracion::setColorStatic('azul');
Configuracion::setNewsletterStatic(true);
Configuracion::setEntornoStatic('produccion');

// Mostramos los valores usando los getters estáticos
echo "Color: " . Configuracion::getColorStatic() . "<br>";
echo "Newsletter: " . (Configuracion::getNewsletterStatic() ? 'Sí' : 'No') . "<br>";
echo "Entorno: " . Configuracion::getEntornoStatic() . "<br>";



